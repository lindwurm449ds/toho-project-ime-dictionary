import * as fs from 'fs-extra';
import { CsvCollection, CsvElement } from '../../@types/CSV';

export abstract class Converter {
  protected items: string[];
  constructor(private data: CsvCollection) {
    this.items = [];
    Object.keys(this.data).forEach((key: string): void => {
      this.items.push(key);
    });
  }

  public setItem = (items: string[]): void => {
    this.items = items;
  };

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
      const convertedData = this.getConvertedData(this.data[item]);
      fs.writeFileSync(path + item + ext, convertedData);
    }
  };

  protected abstract getConvertedData(data: CsvElement[]): string;
}
