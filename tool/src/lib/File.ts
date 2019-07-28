import * as fs from 'fs-extra';

export class File {
  constructor(private path: string) {
    if (this.path.slice(-1) !== '/') {
      this.path = this.path + '/';
    }
  }

  /**
   * クラス初期化時に指定したディレクトリのファイル一覧を取得する。
   * @param {string} filter      フィルターの条件 文字列を指定した場合その文字列と均拡張子のファイルをフィルターする。空白を指定した場合はディレクトリのみフィルターする。
   * @return {string[]}          ファイル一覧の配列
   */
  public getList = (filter?: string): string[] => {
    const list = fs.readdirSync(this.path);
    if (filter || filter === '') {
      return list.filter((file): boolean => {
        let regExp;
        if (filter !== '') {
          regExp = new RegExp(`.*\\.${filter}$`);
        } else {
          regExp = new RegExp(`^[^\\.]*$`);
        }
        return regExp.test(file); //絞り込み
      });
    }
    return list;
  };

  /**
   * クラス初期化時に指定したディレクトリのファイル一覧をサブディレクトリ含めて取得する。
   * @param {string} filter      フィルターの条件 文字列を指定した場合その文字列と均拡張子のファイルをフィルターする。空白を指定した場合はディレクトリのみフィルターする。
   * @return {string[]}          ファイル一覧の配列
   */
  public getListRecursive = (filter?: string, path: string = this.path): string[] => {
    if (path.slice(-1) !== '/') {
      path = path + '/';
    }

    const list = fs.readdirSync(path);
    let output = [];

    list.forEach((item): void => {
      const itemPath = path + item;
      if (fs.statSync(itemPath).isDirectory()) {
        output = output.concat(this.getListRecursive(filter, itemPath)); // ディレクトリなら再帰
      } else {
        if (filter || filter === '') {
          let regExp: RegExp;
          if (filter !== '') {
            regExp = new RegExp(`.*\\.${filter}$`);
          } else {
            regExp = new RegExp(`^[^\\.]*$`);
          }
          if (!regExp.test(item)) return; //絞り込み
        }

        output.push(itemPath);
      }
    });

    return output;
  };
}
