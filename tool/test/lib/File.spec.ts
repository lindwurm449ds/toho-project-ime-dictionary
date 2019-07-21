import { File } from '../../src/lib/File';

describe('File', (): void => {
  describe('getList()', (): void => {
    it('Success', async (): Promise<void> => {
      const path = './test/sampleCSV';
      const file = new File(path);
      const result = ['test.csv'];

      expect(await file.getList()).toEqual(result);
    });
  });
});
