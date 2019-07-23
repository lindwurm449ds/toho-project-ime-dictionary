import * as fs from 'fs-extra';
import { CsvCollection, CsvElement } from '../../@types/CSV';

export abstract class Converter {
  protected items: string[];
  protected rev: string | number;
  constructor(private data: CsvCollection) {
    this.items = [];
    Object.keys(this.data).forEach((key: string): void => {
      this.items.push(key);
    });
  }

  /**
   * 出力する項目をセットする。
   * @param {string[]} items 出力する項目を配列で指定
   */
  public setItem = (items: string[]): void => {
    this.items = items;
  };

  /**
   * 出力するファイルの Rev をセットする。
   * @param {string | number} rev 設定する Rev
   */
  public setRev = (rev: string | number): void => {
    this.rev = rev;
  };

  /**
   * 指定したパスにファイルを書き出す。
   * @param {string} path 出力するディレクトリ
   * @param {string} ext  ファイルの拡張子
   */
  public outputFile = (path: string, ext: string): void => {
    if (path.slice(-1) !== '/') {
      path = path + '/';
    }
    if (path.slice(1) !== '.') {
      ext = '.' + ext;
    }

    if (!fs.existsSync(path)) {
      fs.mkdirpSync(path);
    }

    for (let item of this.items) {
      const convertedData = this.getConvertedData(this.data[item], item);
      fs.writeFileSync(path + item + ext, convertedData);
    }
  };

  /**
   * データオブジェクトを専用の文字列に変換する。
   * @param {CsvElement[]} data 変換するデータ
   * @param {string} fielName   ファイル名
   */
  protected abstract getConvertedData(data: CsvElement[], fileName: string): string;
}
