import * as fs from 'fs-extra';
import * as yaml from 'yaml';
import moment from 'moment';
import { CsvCollection, CsvElement } from '../../@types/CSV';

export interface MetaDataObject {
  includeData: {
    game: string[];
    book: string[];
    musicCd: string[];
  };
  releaseNote: {
    rev: string | number;
    date: string;
    note: string[];
  }[];
}

export abstract class Converter {
  protected items: string[];
  protected rev: string | number;
  protected fileNamePrefix: string;
  protected readMePath: string;
  protected readMeFileName: string;
  protected metaData: MetaDataObject;

  constructor(private data: CsvCollection) {
    this.items = [];
    Object.keys(this.data).forEach((key: string): void => {
      this.items.push(key);
    });

    this.fileNamePrefix = '';
  }

  /**
   * 出力する項目をセットする。
   * @param {string[]} items 出力する項目を配列で指定
   */
  public setItem = (items: string[]): void => {
    this.items = items;
  };

  /**
   * メタデータをセットする。合わせて Rev もセットする。
   * @param {string} metaDataPath パラメータが定義されたメタデータのパス
   */
  public setMetaData = (metaDataPath: string): void => {
    const metaDataContent = fs.readFileSync(metaDataPath, 'utf8');
    this.metaData = yaml.parse(metaDataContent);

    this.rev = this.metaData.releaseNote.slice(-1)[0].rev;
  };

  /**
   * Readme ファイルの変換元をセットする。
   * @param {string} readMePath     Readme の元ファイルのパス
   * @param {string} readMeFileName 出力する Readme のファイル名（拡張子不要）
   */
  public setReadMePath = (readMePath: string, readMeFileName: string): void => {
    this.readMePath = readMePath;
    this.readMeFileName = readMeFileName;
  };

  /**
   * 出力するファイルの Rev をセットする。
   * @param {string | number} rev 設定する Rev
   */
  public setRev = (rev: string | number): void => {
    this.rev = rev;
  };

  /**
   * Rev を取得する。
   * @return {string | number} 入力された最新 Rev
   */
  public getRev = (): string | number => {
    return this.rev;
  };

  /**
   * 出力するファイル名のプレフィックスをセットする。
   * @param {string} prefix 設定する プレフィックス
   */
  public setFileNamePrefix = (prefix: string): void => {
    this.fileNamePrefix = prefix;
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

    // Readme ファイルの設定がされていた場合は Readme ファイルを出力する
    if (this.readMePath) {
      this.outputReadMeFile(path);
    }

    for (let item of this.items) {
      const convertedData = this.getConvertedData(this.data[item], item);
      fs.writeFileSync(path + this.fileNamePrefix + item + ext, convertedData);
    }
  };

  /**
   * Readme ファイルを書き出す。
   * @param {string} path 出力するディレクトリ
   */
  private outputReadMeFile = (path: string): void => {
    let readMeContent = fs.readFileSync(this.readMePath, 'utf8');

    const revTag = `r${this.rev}-${moment(
      new Date(this.metaData.releaseNote.slice(-1)[0].date)
    ).format('YYYYMMDD')}`;

    readMeContent = readMeContent.replace(/{{FileName}}/g, this.readMeFileName);
    readMeContent = readMeContent.replace(/{{Rev}}/g, String(this.rev));
    readMeContent = readMeContent.replace(/{{RevTag}}/g, revTag);
    readMeContent = readMeContent.replace(
      /{{GameList}}/g,
      this.getIncludeDataText(this.metaData.includeData.game, 32, 6)
    );
    readMeContent = readMeContent.replace(
      /{{BookList}}/g,
      this.getIncludeDataText(this.metaData.includeData.book, 32, 6)
    );
    readMeContent = readMeContent.replace(
      /{{MusicCdList}}/g,
      this.getIncludeDataText(this.metaData.includeData.musicCd, 32, 6)
    );

    readMeContent = readMeContent.replace(
      /{{ReleaseNote}}/g,
      this.getReleaseNoteText(this.metaData.releaseNote, 2)
    );

    fs.writeFileSync(path + this.readMeFileName + '.txt', readMeContent);
  };

  /**
   * ReadMe 向けの一覧テキストを取得する
   * @param {string[]} items 一覧の配列
   * @param {number} lineMax 改行すべきと判断する一行あたりの文字数
   * @param {number} indent  インデントの空白文字数
   * @return {string}        テキスト
   */
  private getIncludeDataText = (items: string[], lineMax: number, indent: number): string => {
    let output = '';
    let line = ' '.repeat(indent - 1);

    let count = 1;

    for (let item of items) {
      line += ' ' + item;
      if (count !== items.length) {
        line += ',';
      }

      // 行の文字数が指定値を超えたら改行する
      if (line.length > lineMax || count === items.length) {
        output += line + '\n';
        line = ' '.repeat(indent - 1);
      }
      count++;
    }
    return output;
  };

  /**
   * ReadMe 向けのリリースノートのテキストを取得する
   * @param {MetaDataObject['releaseNote']} items リリースノートのオブジェクトの配列
   * @param {number} indent                       インデントの空白文字数
   * @return {string}                             テキスト
   */
  private getReleaseNoteText = (items: MetaDataObject['releaseNote'], indent: number): string => {
    let output = '';
    items.reverse().forEach((item): void => {
      output += ' '.repeat(indent);
      output += `${item.date} - R${item.rev}-${moment(new Date(item.date)).format('YYYYMMDD')}\n`;
      item.note.forEach((note): void => {
        output += ' '.repeat(indent);
        output += `・${note}\n`;
      });

      output += '\n';
    });
    return output;
  };

  /**
   * データオブジェクトを専用の文字列に変換する。
   * @param {CsvElement[]} data 変換するデータ
   * @param {string} fielName   ファイル名
   */
  protected abstract getConvertedData(data: CsvElement[], fileName: string): string;
}
