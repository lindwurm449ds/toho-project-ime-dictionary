import { CSV } from "./lib/CSV";

console.log("start");

const file = "../dic/1-作品名.csv";

const csv = new CSV(file);

csv.setColumns(["読み", "単語", "品詞", "コメント"]);

csv.getData().then((data): any => {
  console.log(data);
});
