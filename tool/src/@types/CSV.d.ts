export interface CsvElement {
  phonetic: string;
  word: string;
  partsOfSpeech: string;
  comment: string;
}

export interface CsvCollection {
  '0-総合'?: CsvElement[];
  '1-作品名'?: CsvElement[];
  '2-キャラクター'?: CsvElement[];
  '3-曲名'?: CsvElement[];
  '4-用語'?: CsvElement[];
  '5-スペルカード'?: CsvElement[];
  '6-＠変換'?: CsvElement[];
}
