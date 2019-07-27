import * as fs from 'fs-extra';

export class File {
  constructor(private path: string) {}

  /**
   * クラス初期化時に指定したディレクトリのファイル一覧を取得する。
   * @param {string} filter      フィルターの条件 文字列を指定した場合その文字列と均拡張子のファイルをフィルターする。空白を指定した場合はディレクトリのみフィルターする。
   * @return {Promise<string[]>} ファイル一覧の配列
   */
  public getList = async (filter?: string): Promise<string[]> => {
    return await new Promise((resolve, reject): void => {
      fs.readdir(this.path, (err, files): void => {
        if (err) {
          return reject(err);
        }
        if (filter || filter === '') {
          return resolve(
            files.filter((file): boolean => {
              let regExp;
              if (filter !== '') {
                regExp = new RegExp(`.*\\.${filter}$`);
              } else {
                regExp = new RegExp(`^[^\\.]*$`);
              }
              return regExp.test(file); //絞り込み
            })
          );
        }
        return resolve(files);
      });
    });
  };
}
