import { CSV } from "./lib/CSV";
import { File } from "./lib/File";
import { CsvCollection, CsvElement } from "./@types/CSV";

class Controller {
  constructor(private dirPath: string) {
    if (this.dirPath.slice(-1) !== "/") {
      this.dirPath = this.dirPath + "/";
    }
  }

  /**
   * メインの処理を実行する。
   */
  public run = async (): Promise<void> => {
    const file = new File(this.dirPath);
    const fileList = await file.getList();
    //console.log(fileList);

    let csvDatas: CsvCollection = {};
    for (let file of fileList) {
      const csv = new CSV(this.dirPath + file);
      csv.setColumns(["phonetic", "word", "partsOfSpeech", "comment"]);
      csvDatas[
        file.match(/(.*)(?:\.([^.]+$))/)[1]
      ] = ((await csv.getData()) as any) as CsvElement[];
    }

    // 統合版のデータを作成
    const csvIntegrationData = [];
    Object.keys(csvDatas).forEach((key: string): void => {
      csvDatas[key].forEach((item): void => {
        csvIntegrationData.push(item);
      });
    });
    csvDatas["0-総合"] = csvIntegrationData;

    console.log(csvDatas);
  };
}

console.log("start");
const dirPath = "../dic";

const controller = new Controller(dirPath);
controller.run().then();
