import { CSV } from './lib/CSV';
import { File } from './lib/File';
import { CsvCollection, CsvElement } from './@types/CSV';

class Controller {
  constructor(private dirPath: string) {
    if (this.dirPath.slice(-1) !== '/') {
      this.dirPath = this.dirPath + '/';
    }
  }

  /**
   * CsVCollection のデータを全てまとめて別データとして作成する
   * @param {CsvCollection} data まとめたいデータ
   * @return {CsvElement[]}      まとめられたデータ
   */
  private makeIntegrationData = (data: CsvCollection): CsvElement[] => {
    const csvIntegrationData: CsvElement[] = [];
    Object.keys(data).forEach((key: string): void => {
      data[key].forEach((item): void => {
        csvIntegrationData.push(item);
      });
    });
    return csvIntegrationData;
  };

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
      csv.setColumns(['phonetic', 'word', 'partsOfSpeech', 'comment']);
      csvDatas[
        file.match(/(.*)(?:\.([^.]+$))/)[1]
      ] = ((await csv.getData()) as any) as CsvElement[];
    }

    // 統合版のデータを作成
    csvDatas['0-総合'] = this.makeIntegrationData(csvDatas);

    console.log(csvDatas);
  };
}

console.log('start');
const dirPath = '../dic';

const controller = new Controller(dirPath);
controller.run().then();
