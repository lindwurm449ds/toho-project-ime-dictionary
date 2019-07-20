import { CSV } from "./lib/CSV";
import { File } from "./lib/File";
import { CsvCollections } from "./@types/CSV";

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

    const csvDatas: CsvCollections[][] = await Promise.all(
      fileList.map(
        async (file): Promise<any> => {
          const csv = new CSV(this.dirPath + file);
          csv.setColumns(["phonetic", "word", "partsOfSpeech", "comment"]);

          return (csv.getData() as any) as Promise<CsvCollections[]>;
        }
      )
    );

    console.log(csvDatas);
  };
}

console.log("start");
const dirPath = "../dic";

const controller = new Controller(dirPath);
controller.run().then();
