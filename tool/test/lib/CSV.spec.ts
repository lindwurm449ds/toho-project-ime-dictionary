import { CSV } from '../../src/lib/CSV';
import { CsvElement } from '../../src/@types/CSV';

describe('CSV', (): void => {
  describe('getData()', (): void => {
    it('Success', async (): Promise<void> => {
      const file = './test/sampleCSV/test.csv';
      const csv = new CSV(file);
      csv.setColumns(['phonetic', 'word', 'partsOfSpeech', 'comment']);

      const result: CsvElement[] = [
        {
          phonetic: '読み',
          word: '単語',
          partsOfSpeech: '品詞',
          comment: 'コメント'
        }
      ];

      expect(await csv.getData()).toEqual(result);
    });
  });
});
