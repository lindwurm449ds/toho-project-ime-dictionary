import FtpDeploy from 'ftp-deploy';

const host = process.env.FTP_HOST ? process.env.FTP_HOST : '';
const user = process.env.FTP_USER ? process.env.FTP_USER : '';
const password = process.env.FTP_PASSWORD ? process.env.FTP_PASSWORD : '';
const remotePath = process.env.FTP_REMOTE_PATH ? process.env.FTP_REMOTE_PATH : '';
const secure = process.env.FTP_SECURE ? true : false;
const port = 21;

const ftpDeploy = new FtpDeploy();

// アップロード中のファイルのログを出力
ftpDeploy.on('uploading', (data): void => {
  console.log('Uploading', data);
});

// 1ファイルのアップロードが終わった時にログを出力 (進捗率なども分かる)
ftpDeploy.on('uploaded', (data): void => {
  console.log('Uploaded', data);
});

// アップロード中にエラーが発生した場合
ftpDeploy.on('upload-error', (data): void => {
  console.log('Upload Error', data);
});

// FTP 接続しデプロイする
ftpDeploy.deploy(
  {
    user: user,
    password: password,
    host: host,
    port: port,
    secure: secure,
    localRoot: '../web', // ローカルのルートとなるディレクトリを指定
    remoteRoot: remotePath, // リモートのルートとなるディレクトリを指定
    include: ['*', '**/*'], // localRoot 以外に追加でアップしたいファイルがあれば指定する
    exclude: [] // 除外したいファイルがあれば '*.md' などのように指定する
  },
  (error): void => {
    if (error) {
      console.log('Error', error);
      return;
    }

    console.log('Deployed');
  }
);
