<?php
$param = [];
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="東方Project関連の単語を収録したIME変換辞書です。">
		<meta name="author" content="きゅー(Cue)">
		<meta name="viewport" content="initial-scale=1.0">

		<title>東方Project辞書 | Cue:LAB</title>

		<link rel="stylesheet" href="/res/css/styles.css">
		<link rel="icon" type="image/x-icon" href="/res/img/favicon.ico">
		<link rel="alternate" type="application/rss+xml" href="/information/rss2" title="Cue:LAB RSS Feed">

		<!-- [ OGP ] -->
<?php include('../../res/tpl/ogp-tags.php'); ?>
		<!-- /[ OGP ] -->
	</head>
	<body>
		<!-- [ Global Header ] -->
<?php include('../../res/tpl/global-header.php'); ?>
		<!-- /[ Global Header ] -->

		<div id="main">
			<header>
				<h1>東方Project辞書</h1>
				<p class="location"><span class="label">現在地:&nbsp;</span><a href="/">Home</a> &raquo; <a href="/works/">Works</a> &raquo; 東方Project辞書</p>

				<p class="description">東方Project関連の単語を収録したIME変換辞書です。</p>
			</header>

			<article>
				<section class="social-button">
					<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</section>

				<section id="works-page-header">
					<figure><img src="img/th-dic-header.png" width="980" height="240" alt=""></figure>
				</section>

				<section>
					<h2 id="SUMMARY">概要</h2>
					<p>
						この辞書は、同人サークル「<a href="http://www16.big.or.jp/%7Ezun/" class="ext">上海アリス幻樂団</a>」様制作の弾幕系シューティングを中心としたゲーム、書籍、音楽CDから成る作品群「東方Project」関連の作品名、用語、キャラクター名などを変換することができます。<br>
						東方Project関連の単語を幅広く収録しており、難しい単語も簡単に変換できます。
					</p>
					<p>
						ここでは、<a href="http://www.microsoft.com/ja-jp/office/2010/ime/default.aspx" class="ext">Office IME 2010</a>用オープン拡張辞書ファイル(.dctxc形式)、<a href="http://www.justsystems.com/jp/products/atok/" class="ext">ATOK</a>用辞書ファイル(.dic形式)、<a href="http://www.google.co.jp/ime/" class="ext">Google 日本語入力</a>用辞書ファイル(.txt形式)、MS-IME形式辞書ファイル(.txt形式)の辞書ファイルを公開しています。<br>
						<strong>Windows 8以降のMS-IME(2012以降)</strong>をご使用の方は、<strong>オープン拡張辞書版</strong>がオススメです。
					</p>
				</section>

				<section>
					<h2 id="UPDATE">更新履歴</h2>
					<dl class="update-history">
						<dt>2019/07/18: <strong>R8-20190718</strong></dt>
						<dd>
							<ul>
								<li>憑依華に対応</li>
								<li>天空璋に対応</li>
								<li>秘封ナイトメアダイアリーに対応</li>
								<li>鬼形獣(体験版)に対応</li>
								<li>The Grimoire of Usamiに対応</li>
								<li>外來韋編を更新</li>
								<li>茨歌仙を更新</li>
								<li>鈴奈庵を更新</li>
								<li>読み訂正[スペカ：積乱「見越し入道雲」] (みこしのにゅうどうぐも -> みこしにゅうどうぐも)</li>
								<li>その他全体的にコメント内容を変更(表記揺れの修正など)</li>
							</ul>
						</dd>

						<dt>2017/05/09: <strong>R7-20170509</strong></dt>
						<dd>
							<ul>
								<li>憑依華(体験版)に一部対応</li>
								<li>天空璋(体験版)に一部対応</li>
								<li>燕石博物誌に対応</li>
								<li>旧約酒場に対応</li>
								<li>文果真報に対応</li>
								<li>外來韋編に対応</li>
								<li>三月精を更新</li>
								<li>茨歌仙を更新</li>
								<li>鈴奈庵を更新</li>
								<li>単語追加[作品名:トルテルマジック]</li>
								<li>単語追加[作品名:西方Project]</li>
								<li>単語追加[曲名:8BIT MUSIC POWER FINAL/Mysterious Shrine]</li>
								<li>単語追加[用語:尸解仙]</li>
								<li>単語追加[用語:夢幻病]</li>
								<li>単語追加[用語:酒呑童子]</li>
								<li>単語追加[スペカ:ダブルスポイラー/お札「新聞拡張団調伏」]</li>
								<li>誤記訂正[＠変換:＠さにーみるく/光を屈折を操る程度の能力 -> 光の屈折を操る程度の能力]</li>
								<li>読み訂正[曲名:ダブルスポイラー/ネメシスの要塞] (めねしすのようさい -> ねめしすのようさい)</li>
								<li>その他全体的にコメント内容を変更(表記揺れの修正など)</li>
							</ul>
						</dd>

						<dt>2015/08/25: <strong>Release 6</strong></dt>
						<dd>
							<ul>
								<li>弾幕アマノジャクに対応</li>
								<li>深秘録に対応</li>
								<li>紺珠伝に対応</li>
								<li>その他全体的にコメント内容を変更(追加による文字数制限回避など)</li>
							</ul>
						</dd>

						<dt>2013/10/23: <strong>Release 5</strong></dt>
						<dd>
							<ul>
								<li>単語追加[永夜抄:「蓬莱人形」]</li>
								<li>単語追加[萃夢想:酔符「鬼縛りの術」]</li>
								<li>読み追加[Highly Responsive to Prayers] +(はいりーれすぽんしぶとぅぷれいやーず)</li>
								<li>読み追加[古の冥界寺] +(いにしえのめいかいでら)</li>
								<li>誤記訂正(リシッドパラダイス -> リジッドパラダイス)</li>
								<li>誤記訂正(不思議な不思議な道具たち -> 不思議な不思議な道具達)</li>
								<li>誤記訂正(雷矢「カゴウジサイクロン」 -> 雷矢「ガゴウジサイクロン」)</li>
								<li>誤記訂正(雷矢「カゴウジトルネード」 -> 雷矢「ガゴウジトルネード」)</li>
								<li>読み訂正[華霊「ディープルーティドバタフライ」] (でぃーぷるーでぃどばたふらい -> でぃーぷるーてぃどばたふらい)</li>
								<li>読み訂正[宴会「死して全て大団円」] (ししてすべてだいえんだん -> ししてすべてだいだんえん)</li>
								<li>読み訂正[桜符「桜吹雪地獄」] (さくらふぶきゆきじごく -> さくらふぶきじごく)</li>
								<li>読み訂正[結界「動と静の均衡」] (どうとせいののきんこう -> どうとせいのきんこう)</li>
								<li>読み訂正[参番勝負「延羽化弾幕変化」] (りょうせいかだんまくへんげ -> のべはかだんまくへんげ)</li>
								<li>読み訂正[響符「平安の残響」] (へいあんのざんぎょう -> へいあんのざんきょう)</li>
								<li>スペルカード辞書で [スウィープアサイド] の単語登録に失敗する不具合を修正</li>
								<li>コメント文字数制限で登録に失敗する不具合を修正(全体的にコメントの内容を変更しています)</li>
								<li>＠変換辞書を再構築</li>
							</ul>
						</dd>

						<dt>2013/09/07: <strong>Release 4</strong></dt>
						<dd>
							<ul>
								<li>輝針城に対応</li>
								<li>心綺楼を更新</li>
							</ul>
						</dd>

						<dt>2013/06/21: <strong>Release 3</strong></dt>
						<dd>
							<ul>
								<li>心綺楼に対応(とりあえず)</li>
								<li>輝針城(体験版)に対応(とりあえず)</li>
								<li>茨歌仙を更新</li>
								<li>鈴奈庵を更新</li>
								<li>誤記訂正(妖精大戦争　～ Fairy War -> 妖精大戦争　～ Fairy Wars)</li>
								<li>誤記訂正(天符「天の磐船よ天へ昇れ」 -> 天符「天の磐舟よ天へ昇れ」)</li>
							</ul>
						</dd>

						<dt>2013/02/16: <strong>Release 2</strong></dt>
						<dd>
							<ul>
								<li>MS-IME版でインポートできない不具合を修正</li>
								<li>＠変換辞書でこいしのスペルが一部変換できない不具合を修正</li>
								<li>Google 日本語入力版を作成</li>
							</ul>
						</dd>

						<dt>2013/02/13: <strong>Release 1</strong></dt>
						<dd>初版公開</dd>
					</dl>
				</section>

				<section>
					<h2 id="INCLUDED">収録単語</h2>
					<h3>収録作品</h3>
					<dl class="compact-dl">
						<dt>ゲーム</dt>
							<dd>靈異伝, 封魔録, 夢時空, 幻想郷, 怪綺談, 紅魔郷, 妖々夢, 永夜抄, 萃夢想, 花映塚, 文花帖, 風神録, 緋想天, 地霊殿, 星蓮船, 非想天則, ダブルスポイラー, 妖精大戦争, 神霊廟, 心綺楼, 輝針城, 弾幕アマノジャク, 深秘録, 紺珠伝, 憑依華, 天空璋, ナイトメアダイアリー, 鬼形獣(体験版)</dd>
						<dt>書籍</dt>
							<dd>文花帖, 求聞史紀, 求聞口授, 香霖堂, 三月精, 儚月抄, The Grimoire of Marisa, 茨歌仙, 鈴奈庵, 文果真報, 外來韋編, The Grimoire of Usami</dd>
						<dt>音楽CD</dt>
							<dd>蓬莱人形, 蓮台野夜行, 夢違科学世紀, 卯酉東海道, 大空魔術, 未知の花　魅知の旅, 鳥船遺跡, 伊弉諾物質, 燕石博物誌, 旧約酒場, 単行本付属CD, 幺樂団の歴史1～5</dd>
					</dl>
					<p>その他、一部のゲスト参加作品の作品名などを収録しています。</p>

					<h3>収録内容</h3>
					<p>各作品名, キャラクター名, 二つ名, 能力, 曲名, スペルカード名, その他関連単語</p>
					<p>オプションとして、＠キャラ名で二つ名、能力、スペルカード名を、＠作品名でその作品での収録曲をなどを一覧表示し変換できる＠変換用辞書もご用意しております。詳細は、付属テキストをご参照ください。</p>
				</section>

				<section>
					<h2 id="DOWNLOAD">ダウンロード</h2>

					<article>
						<section class="download">
							<h3>for オープン拡張辞書</h3>
							<ul>
								<li>バージョン: <strong>R8-20190718</strong></li>
								<li>更新日: 2019/07/18</li>
								<li>
									<a href="https://cloud.9lab.jp/index.php/s/MrQv8Tb29D95ueM" title="東方Project辞書 for オープン拡張辞書">ダウンロード</a>
									(ZIP形式, 517KB)
								</li>
							</ul>
						</section>

						<section class="download">
							<h3>for ATOK</h3>
							<ul>
								<li>バージョン: <strong>R8-20190718</strong></li>
								<li>更新日: 2019/07/18</li>
								<li>
									<a href="https://cloud.9lab.jp/index.php/s/qUXijUe85Mn2l7U" title="東方Project辞書 for ATOK">ダウンロード</a>
									(ZIP形式, 1,519KB)
								</li>
							</ul>
						</section>

						<section class="download">
							<h3>for Google 日本語入力</h3>
							<ul>
								<li>バージョン: <strong>R8-20190718</strong></li>
								<li>更新日: 2019/07/18</li>
								<li>
									<a href="https://cloud.9lab.jp/index.php/s/3EbkhReDFFpS0Ph" title="東方Project辞書 for Google 日本語入力">ダウンロード</a>
									(ZIP形式, 333KB)
								</li>
							</ul>
						</section>

						<section class="download">
							<h3>for MS-IME</h3>
							<ul>
								<li>バージョン: <strong>R8-20190718</strong></li>
								<li>更新日: 2019/07/18</li>
								<li>
									<a href="https://cloud.9lab.jp/index.php/s/WwYiDMHF91HZP67" title="東方Project辞書 for MS-IME">ダウンロード</a>
									(ZIP形式, 330KB)
								</li>
							</ul>
						</section>
					</article>
				</section>

				<section>
					<h2 id="COPYRIGHT">著作権、再配布等について</h2>
					<p>
						本辞書の著作権は、放棄いたします。どうぞご自由にお使いください。<br>
						わたしは、東方Projectは原作者である<a href="http://www16.big.or.jp/%7Ezun/" class="ext">上海アリス幻樂団</a>/ZUN様及び各派生作品の作者様、二次創作を行う作者様、ゲームをプレイする方々など、皆様の手で作り上げられているものだと認識しています。<br>
						本辞書を作成するにあたって、所有していない作品の情報等は後述のインターネット上の情報サイトや他のIME辞書を参考にしております。
					</p>
					<p>
						そうしたことから、東方Projectを愛する皆様がより楽しく、楽に、創作活動や交流を行えるよう、転載、再配布、編集等はご自由にしていただいて構いません。<br>
						ただ、一通りの確認はしているものの、わたしが所有していない作品もあるため、誤りや抜け、編集時のミス等があるかもしれません。<br>
						そのため、<strong>本辞書の正当性を保証することはできません</strong>。<br>
						<strong>本辞書を使用したことにより生じた如何なる事態に対しても、作成者のきゅー(Cue)はその責を負いかねます</strong>ので、使用に際しては各自でご判断願います。
					</p>
					<p>
						また、本辞書を元に編集し公開する際ですが、ファイル名を変更するなど混同をしないようご配慮いただけると、使用者の方々も助かると思います。<br>
						オープン拡張辞書については、GUID値を変更していただくようお願いいたします。詳細は、Microsoft社のオープン拡張辞書に関する資料をご参照願います。<br>
						(参考: <a href="http://www.microsoft.com/ja-jp/office/2010/ime/open-extended-dictionary.aspx" class="ext">http://www.microsoft.com/ja-jp/office/2010/ime/open-extended-dictionary.aspx</a>)
					</p>
				</section>

				<section>
					<h2>謝辞</h2>
					<p>本辞書を作成するに当たり、下記のサイト、IME辞書を参考にさせていただきました。この場を借りて、深くお礼申し上げます。</p>

					<h3>参考にさせていただいたサイト(敬称略)</h3>
					<section>
						<div class="link-item">
							<figure><a href="http://www16.big.or.jp/~zun/"><img src="/links/img/shanghai-alice.gif" width="200" height="40" alt="上海アリス幻樂団"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://www16.big.or.jp/~zun/">上海アリス幻樂団</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://www.tasofro.net/"><img src="/links/img/twilight-frontier.gif" width="200" height="40" alt="黄昏フロンティア"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://www.tasofro.net/">黄昏フロンティア</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://thwiki.info/"><img src="/links/img/th-wiki.png" width="200" height="40" alt="東方Wiki"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://thwiki.info/">東方Wiki</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://sukimanet.net/"><img src="/res/img/no-banner.svg" width="200" height="40" alt="幻想情報局 -スキマネット-"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://sukimanet.net/">幻想情報局 -スキマネット-</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://seesaawiki.jp/toho-motoneta_2nd/"><img src="/res/img/no-banner.svg" width="200" height="40" alt="東方元ネタwiki 2nd"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://seesaawiki.jp/toho-motoneta_2nd/">東方元ネタwiki 2nd</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://ja.wikipedia.org/wiki/%E6%9D%B1%E6%96%B9Project"><img src="/res/img/no-banner.svg" width="200" height="40" alt="東方Project - Wikipedia"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://ja.wikipedia.org/wiki/%E6%9D%B1%E6%96%B9Project">東方Project - Wikipedia</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://www38.atwiki.jp/hisouten/"><img src="/res/img/no-banner.svg" width="200" height="40" alt="東方緋想天Wiki"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://www38.atwiki.jp/hisouten/">東方緋想天Wiki</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://th123.glasscore.net/"><img src="/res/img/no-banner.svg" width="200" height="40" alt="東方非想天則 Wiki"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://th123.glasscore.net/">東方非想天則 Wiki</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://th135.glasscore.net/"><img src="/res/img/no-banner.svg" width="200" height="40" alt="東方心綺楼 Wiki"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://th135.glasscore.net/">東方心綺楼 Wiki</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://wikiwiki.jp/shinpiroku/"><img src="/res/img/no-banner.svg" width="200" height="40" alt="東方深秘録 総合wiki"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://wikiwiki.jp/shinpiroku/">東方深秘録 総合wiki</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://th135.glasscore.net/"><img src="/res/img/no-banner.svg" width="200" height="40" alt="東方心綺楼 Wiki"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://wikiwiki.jp/thk/">東方Project攻略 Wiki</a></p>
							</div>
						</div>
					</section>

					<section>
						<h3>参考にさせていただいたIME辞書の配布元サイト(敬称略)</h3>
						<div class="link-item">
							<figure><a href="http://starrish.web.fc2.com/"><img src="/links/img/starrish.gif" width="200" height="40" alt="てきとーに。"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://starrish.web.fc2.com/">てきとーに。</a></p>
							</div>
						</div>
						<div class="link-item">
							<figure><a href="http://zawa.s18.xrea.com/"><img src="/res/img/no-banner.svg" width="200" height="40" alt="ZaWorld ～ざ・わーるど～"></a></figure>
							<div class="link-item-info">
								<p class="link-site-name"><a href="http://zawa.s18.xrea.com/">ZaWorld ～ざ・わーるど～</a></p>
							</div>
						</div>
					</section>
				</section>

				<section>
					<h2 id="ARCHIVE">過去のRelease</h2>

					<ul>
						<li><a href="https://cloud.9lab.jp/index.php/s/k5xYagb9xVcL61X">過去のReleaseの保管庫</a>をご覧ください。</li>
					</ul>
				</section>

				<section class="social-button">
					<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</section>
			</article>
		</div>

		<!-- [ Global Footer ] -->
<?php include('../../res/tpl/global-footer.php'); ?>
		<!-- /[ Global Footer ] -->

		<!-- [ scripts ] -->
			<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
			<script src="/res/js/common.js"></script>
		<!-- /[ scripts ] -->
	</body>
</html>
