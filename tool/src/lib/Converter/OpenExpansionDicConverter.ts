import * as fs from 'fs-extra';
import * as xml2js from 'xml2js';
import * as uuid from 'uuid';
import { Converter } from './Converter';
import { CsvElement } from '../../@types/CSV';

interface XmlHeader {
  'ns1:DictionaryHeader': {
    'ns1:DictionaryGUID': string;
    'ns1:DictionaryLanguage': 'ja-jp';
    'ns1:DictionaryVersion': string | number;
    'ns1:SourceURL': string;
    'ns1:CommentInsertion': string | boolean;
    'ns1:DictionaryInfo': {
      'ns1:ShortName': string;
      'ns1:LongName': string;
      'ns1:Description': string;
      'ns1:Copyright': string;
      'ns1:CommentHeader1': string;
    };
  };
}

interface XmlEntry {
  'ns1:DictionaryEntry': {
    'ns1:PartOfSpeech': string;
    'ns1:OutputString': string;
    'ns1:InputString': string;
    'ns1:CommentData1': string;
    'ns1:Priority': string | number;
    'ns1:ReverseConversion': string | boolean;
    'ns1:CommonWord': string | boolean;
  };
}

export class OpenExpansionDicConverter extends Converter {
  public getConvertedData = (data: CsvElement[], fileName: string): string => {
    const builder = new xml2js.Builder({ rootName: 'ns1:Dictionary' });
    let xmlData: (XmlHeader | XmlEntry)[] = [];

    const dicName = fileName.split('-')[1];

    const header: XmlHeader = {
      'ns1:DictionaryHeader': {
        'ns1:DictionaryGUID': `{${uuid.v4().toUpperCase()}}`,
        'ns1:DictionaryLanguage': 'ja-jp',
        'ns1:DictionaryVersion': this.rev ? this.rev : 0,
        'ns1:SourceURL': 'https://9lab.jp/works/dic/th-dic.html',
        'ns1:CommentInsertion': false,
        'ns1:DictionaryInfo': {
          'ns1:ShortName': `東方Project ${dicName}辞書`,
          'ns1:LongName': `東方Project ${dicName}辞書`,
          'ns1:Description': `同人サークル「上海アリス幻樂団」制作の弾幕系シューティングを中心としたゲーム、書籍、音楽CDなどから成る作品群「東方Project」の${dicName}辞書です。`,
          'ns1:Copyright': 'きゅー(Cue)',
          'ns1:CommentHeader1': 'コメント'
        }
      }
    };
    xmlData.push(header);
    data.forEach((item): void => {
      const entry: XmlEntry = {
        'ns1:DictionaryEntry': {
          'ns1:PartOfSpeech': item.partsOfSpeech,
          'ns1:OutputString': item.word,
          'ns1:InputString': item.phonetic,
          'ns1:CommentData1': item.comment,
          'ns1:Priority': 100,
          'ns1:ReverseConversion': true,
          'ns1:CommonWord': true
        }
      };
      xmlData.push(entry);
    });
    let convertString = builder.buildObject(xmlData);
    convertString = convertString.replace(
      /<ns1:Dictionary>/,
      '<ns1:Dictionary xmlns:ns1="http://www.microsoft.com/ime/dctx">'
    );
    convertString = convertString.replace(
      /<ns1:DictionaryInfo>/,
      '<ns1:DictionaryInfo Language="ja-jp">'
    );
    return convertString;
  };

  public saveFile = (fileName: string, content: string): void => {
    fs.writeFileSync(fileName, '\ufeff' + content, 'utf8');
  };
}
