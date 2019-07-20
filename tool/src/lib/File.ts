import * as fs from "fs-extra";

export class File {
  constructor(private path: string) {}

  /**
   * クラス初期化時に指定したディレクトリのファイル一覧を取得する。
   * @return {Promise<string[]>} ファイル一覧の配列
   */
  public getList = async (): Promise<string[]> => {
    return await new Promise((resolve, reject): void => {
      fs.readdir(this.path, (err, files): void => {
        if (err) {
          return reject(err);
        }
        let fileList = files.filter((file): boolean => {
          return /.*\.csv$/.test(file); //絞り込み
        });
        return resolve(fileList);
      });
    });
  };
}
