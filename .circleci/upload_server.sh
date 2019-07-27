#!/bin/sh

# updateを呼んであげないと、インストールできないとエラーになったため、updateを呼んでます
echo "Running: apt-get -y -qq update"
echo $(apt-get -y -qq update)


# git-ftpを使うため、インストール。
echo "Running: apt-get install git-ftp"
echo $(apt-get install git-ftp)

echo "Running: git ftp --version"
echo $(git ftp --version)

# git config git-ftp.user "$USER_NAME"
# git config git-ftp.url "$URL"
# git config git-ftp.password "$PASSWORD"

echo "Running: git ftp push --remote-root $FTP_PATH"
git ftp push -u $FTP_USER_NAME -p $FTP_PASSWORD --remote-root $FTP_PATH $FTP_HOST
