import * as fs from 'fs-extra';
import * as archiver from 'archiver';
import * as yaml from 'yaml';
import * as bytes from 'bytes';
import { File } from './lib/File';

interface UploadDataObject {
  UploadFileData: {
    'MS-IME': {
      fileSize: string;
    };
    Google日本語入力: {
      fileSize: string;
    };
    オープン拡張辞書: {
      fileSize: string;
    };
    ATOK: {
      fileSize: string;
    };
  };
}

class Controller {
  private uploadDirPath: string;
  private packageDirPath: string;
  private distDirPath: string;

  private fileNameMapping: {
    'MS-IME': string;
    Google日本語入力: string;
    オープン拡張辞書: string;
    ATOK: string;
  };

  constructor(metaDataPath) {
    const metaDataContent = fs.readFileSync(metaDataPath, 'utf8');
    const metaData = yaml.parse(metaDataContent);

    const rev = metaData.releaseNote.slice(-1)[0].rev;
    this.fileNameMapping = {
      'MS-IME': `th-dic-r${rev}-msime`,
      Google日本語入力: `th-dic-r${rev}-google`,
      オープン拡張辞書: `th-dic-r${rev}-open`,
      ATOK: `th-dic-r${rev}-atok`
    };
  }

  /**
   * パスを設定する
   * @param {string} uploadDirPath  アップロードの対象となるディレクトリのパス
   * @param {string} packageDirPath zip ファイルの出力先となるディレクトリのパス
   * @param {string} distDirPath    zip ファイルの圧縮元となるディレクトリのパス
   */
  public setPath = (uploadDirPath: string, packageDirPath: string, distDirPath: string): void => {
    this.uploadDirPath = uploadDirPath;
    this.packageDirPath = packageDirPath;
    this.distDirPath = distDirPath;

    if (this.uploadDirPath.slice(-1) !== '/') {
      this.uploadDirPath = this.uploadDirPath + '/';
    }
    if (this.packageDirPath.slice(-1) !== '/') {
      this.packageDirPath = this.packageDirPath + '/';
    }
    if (this.distDirPath.slice(-1) !== '/') {
      this.distDirPath = this.distDirPath + '/';
    }
  };

  /**
   * Yaml に保存する。2 回目以降が呼ばれたときは既存のデータとマージする。
   * @param {number} fileSize                                                記録するファイルサイズを bytes で指定
   * @param {'MS-IME' | 'Google日本語入力' | 'オープン拡張辞書' | 'ATOK'} item yaml に記録するアイテム名
   */
  public saveYaml = (
    fileSize: number,
    item: 'MS-IME' | 'Google日本語入力' | 'オープン拡張辞書' | 'ATOK'
  ): void => {
    const upliadDataPath = this.uploadDirPath + 'uploadData.yml';

    let uploadData: UploadDataObject = {
      UploadFileData: {
        'MS-IME': {
          fileSize: '0'
        },
        Google日本語入力: {
          fileSize: '0'
        },
        オープン拡張辞書: {
          fileSize: '0'
        },
        ATOK: {
          fileSize: '0'
        }
      }
    };

    if (fs.existsSync(upliadDataPath)) {
      uploadData = yaml.parse(fs.readFileSync(upliadDataPath, 'utf8'));
    }

    uploadData.UploadFileData[item].fileSize = bytes.format(fileSize);

    fs.writeFileSync(this.uploadDirPath + 'uploadData.yml', yaml.stringify(uploadData));
  };

  /**
   * メインの処理を実行する。
   */
  public run = async (): Promise<void> => {
    if (!this.uploadDirPath || !this.packageDirPath || !this.distDirPath) {
      throw new Error('Param not defined.');
    }

    const distDir = new File(this.distDirPath);
    const distDirList = await distDir.getList('');

    if (!fs.existsSync(this.packageDirPath)) {
      fs.mkdirpSync(this.packageDirPath);
    }

    distDirList.forEach(
      (item: 'MS-IME' | 'Google日本語入力' | 'オープン拡張辞書' | 'ATOK'): void => {
        const archive = archiver.create('zip', {});
        const output = fs.createWriteStream(
          this.fileNameMapping[item]
            ? this.packageDirPath + this.fileNameMapping[item] + '.zip'
            : this.packageDirPath + item + '.zip'
        );
        archive.pipe(output);

        archive.directory(this.distDirPath + item, false);

        output.on('close', (): void => {
          // zip ファイルのサイズを yml に保存
          this.saveYaml(archive.pointer(), item);
        });

        // zip圧縮実行
        archive.finalize();
      }
    );
  };
}

console.log('start');

const uploadDirPath = '../web';
const packageDirPath = '../web/package';
const distDirPath = '../dist';
const metaDataPath = '../assets/metadata.yml';

const controller = new Controller(metaDataPath);
controller.setPath(uploadDirPath, packageDirPath, distDirPath);
controller
  .run()
  .then((): void => {
    console.log('complete');
  })
  .catch((err): void => {
    throw err;
  });
