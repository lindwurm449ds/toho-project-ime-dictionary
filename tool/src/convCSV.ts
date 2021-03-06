import { CSV } from './lib/CSV';
import { File } from './lib/File';
import { GoogleIMEConverter } from './lib/Converter/GoogleIMEConverter';
import { OpenExpansionDicConverter } from './lib/Converter/OpenExpansionDicConverter';
import { MSIMEConverter } from './lib/Converter/MSIMEConverter';
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
  public run = async (outputPath: string): Promise<void> => {
    if (outputPath.slice(-1) !== '/') {
      outputPath = outputPath + '/';
    }

    const file = new File(this.dirPath);
    const fileList = file.getList('csv');
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

    /**
     * ファイルの出力
     */
    // Google日本語入力
    const googleIMEConverter = new GoogleIMEConverter(csvDatas);
    googleIMEConverter.setMetaData('../assets/metaData.yml');
    googleIMEConverter.setReadMePath('../assets/readme/GoogleIME.txt', 'はじめにお読みください');
    googleIMEConverter.setFileNamePrefix(`thdic-r${googleIMEConverter.getRev()}-`);
    googleIMEConverter.outputFile(outputPath + 'Google日本語入力', 'txt');

    // オープン拡張辞書
    const openExpansionDicConverter = new OpenExpansionDicConverter(csvDatas);
    openExpansionDicConverter.setMetaData('../assets/metaData.yml');
    openExpansionDicConverter.setReadMePath(
      '../assets/readme/OpenExpansionDic.txt',
      'はじめにお読みください'
    );
    openExpansionDicConverter.setFileNamePrefix(`thdic-r${googleIMEConverter.getRev()}-`);
    openExpansionDicConverter.outputFile(outputPath + 'オープン拡張辞書', 'dctx');

    // MS-IME
    const msIMEConverter = new MSIMEConverter(csvDatas);
    msIMEConverter.setMetaData('../assets/metaData.yml');
    msIMEConverter.setReadMePath('../assets/readme/MSIME.txt', 'はじめにお読みください');
    msIMEConverter.setFileNamePrefix(`thdic-r${msIMEConverter.getRev()}-`);
    msIMEConverter.outputFile(outputPath + 'MS-IME', 'txt');
  };
}

console.log('start');
const dirPath = '../dic';
const outputPath = '../dist';

const controller = new Controller(dirPath);
controller.run(outputPath).then((): void => {
  console.log('complete');
});
