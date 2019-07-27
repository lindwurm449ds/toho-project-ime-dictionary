import { File } from '../../src/lib/File';

describe('File', (): void => {
  describe('getList()', (): void => {
    it('Success - csv match', async (): Promise<void> => {
      const path = './test/sampleCSV';
      const file = new File(path);
      const result = ['test.csv'];

      expect(await file.getList('csv')).toEqual(result);
    });

    it('Success - csv not match', async (): Promise<void> => {
      const path = './test/sampleCSV';
      const file = new File(path);
      const result = [];

      expect(await file.getList('zip')).toEqual(result);
    });

    it('Success - all file match', async (): Promise<void> => {
      const path = './test/sampleCSV';
      const file = new File(path);
      const result = ['test.csv'];

      expect(await file.getList()).toEqual(result);
    });

    it('Success - dir match', async (): Promise<void> => {
      const path = './test';
      const file = new File(path);
      const result = ['lib', 'sampleCSV'];

      expect(await file.getList('')).toEqual(result);
    });
  });
});
