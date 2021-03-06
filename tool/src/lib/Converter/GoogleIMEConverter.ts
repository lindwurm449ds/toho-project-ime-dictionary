import * as fs from 'fs-extra';
import { Converter } from './Converter';
import { CsvElement } from '../../@types/CSV';

export class GoogleIMEConverter extends Converter {
  public getConvertedData = (data: CsvElement[]): string => {
    let convertString = '';
    data.forEach((item): void => {
      convertString +=
        item.phonetic + '\t' + item.word + '\t' + item.partsOfSpeech + '\t' + item.comment + '\n';
    });
    return convertString;
  };

  public saveFile = (fileName: string, content: string): void => {
    fs.writeFileSync(fileName, content, 'utf8');
  };
}
