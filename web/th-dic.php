<?php
require_once (dirname(__FILE__) . '/Spyc.php');
 
$data = spyc_load_file('data.yml');

$last = end($data['release-note']);
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
						<?php 
							foreach(array_reverse ($data['release-note']) as $item){
								echo '<dt>'.$item['date'].': <strong>R'.$last['rev'].'-'.date('Ymd', strtotime($last['date'])).'</strong></dt>'."\n";
								echo '<dd><ul>'."\n";
								foreach ($item['note'] as $value) {
									echo '<li>'.$value.'</li>'."\n";
								}
								echo '</ul></dd>'."\n";
								echo "\n";
							}
						?>
				</section>

				<section>
					<h2 id="INCLUDED">収録単語</h2>
					<h3>収録作品</h3>
					<dl class="compact-dl">
						<dt>ゲーム</dt>
							<dd><?php echo join(', ', $data['include-data']['game']) ?></dd>
						<dt>書籍</dt>
							<dd><?php echo join(', ', $data['include-data']['book']) ?></dd>
						<dt>音楽CD</dt>
							<dd><?php echo join(', ', $data['include-data']['music-cd']) ?></dd>
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
								<li>バージョン: <strong><?php echo 'R'.$last['rev'].'-'.date('Ymd', strtotime($last['date'])) ?></strong></li>
								<li>更新日: <?php echo $last['date'] ?></li>
								<li>
									<a href="https://cloud.9lab.jp/index.php/s/MrQv8Tb29D95ueM" title="東方Project辞書 for オープン拡張辞書">ダウンロード</a>
									(ZIP形式, 517KB)
								</li>
							</ul>
						</section>

						<section class="download">
							<h3>for ATOK</h3>
							<ul>
								<li>バージョン: <strong><?php echo 'R'.$last['rev'].'-'.date('Ymd', strtotime($last['date'])) ?></strong></li>
								<li>更新日: <?php echo $last['date'] ?></li>
								<li>
									<a href="https://cloud.9lab.jp/index.php/s/qUXijUe85Mn2l7U" title="東方Project辞書 for ATOK">ダウンロード</a>
									(ZIP形式, 1,519KB)
								</li>
							</ul>
						</section>

						<section class="download">
							<h3>for Google 日本語入力</h3>
							<ul>
								<li>バージョン: <strong><?php echo 'R'.$last['rev'].'-'.date('Ymd', strtotime($last['date'])) ?></strong></li>
								<li>更新日: <?php echo $last['date'] ?></li>
								<li>
									<a href="https://cloud.9lab.jp/index.php/s/3EbkhReDFFpS0Ph" title="東方Project辞書 for Google 日本語入力">ダウンロード</a>
									(ZIP形式, 333KB)
								</li>
							</ul>
						</section>

						<section class="download">
							<h3>for MS-IME</h3>
							<ul>
								<li>バージョン: <strong><?php echo 'R'.$last['rev'].'-'.date('Ymd', strtotime($last['date'])) ?></strong></li>
								<li>更新日: <?php echo $last['date'] ?></li>
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
