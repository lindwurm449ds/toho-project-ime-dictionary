import * as fs from "fs-extra";
import * as csv from "csv";

export class CSV {
  private data: any;
  private columns: boolean | string[];
  constructor(private path: string) {}

  /**
   * CSV ファイルを読み込み、オブジェクトに変換しプロパティに格納する。
   */
  private readFile = async (): Promise<void> => {
    const readableStream = await fs.createReadStream(this.path, {
      encoding: "utf-8"
    });

    this.data = await new Promise((resolve, reject): void => {
      readableStream.pipe(
        csv.parse(
          { delimiter: ",", columns: this.columns },
          (err, data): void => {
            if (err) {
              return reject(err);
            }
            return resolve(data);
          }
        )
      );
    });
  };

  /**
   * CSV の 列を定義する。
   * @param {boolean | string[]} column true を指定すると1行目の値が列になり、false を指定すると列無しとして key がないものとして扱われる。文字列配列を渡すことで列を設定することもできる。
   */
  public setColumns = (columns: boolean | string[]): void => {
    this.columns = columns;
  };

  /**
   * CSV のオブジェクトを取得する。
   * @return {Promise<{ [s: string]: string }[] | string[][]>} CSV のオブジェクト。列指定の有無で返る型が変わる。
   */
  public getData = async (): Promise<
    { [s: string]: string }[] | string[][]
  > => {
    if (!this.data) {
      await this.readFile();
    }
    return this.data;
  };
}
