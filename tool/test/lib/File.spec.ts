import { File } from '../../src/lib/File';

describe('File', (): void => {
  describe('getList()', (): void => {
    it('Success - csv match', (): void => {
      const path = './test/sampleCSV';
      const file = new File(path);
      const result = ['test.csv'];

      expect(file.getList('csv')).toEqual(result);
    });

    it('Success - csv not match', (): void => {
      const path = './test/sampleCSV';
      const file = new File(path);
      const result = [];

      expect(file.getList('zip')).toEqual(result);
    });

    it('Success - all file match', (): void => {
      const path = './test/sampleCSV';
      const file = new File(path);
      const result = ['test.csv'];

      expect(file.getList()).toEqual(result);
    });

    it('Success - dir match', (): void => {
      const path = './test';
      const file = new File(path);
      const result = ['lib', 'sampleCSV'];

      expect(file.getList('')).toEqual(result);
    });
  });
});
