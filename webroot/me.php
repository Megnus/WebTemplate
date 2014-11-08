<?php 
/**
 * This is a Anax pagecontroller.
 *
 */
// Include the essential config-file which also creates the $anax variable with its defaults.
include(__DIR__.'/config.php');

include('../src/CNavigation.php');
 
// Do it and store it all in variables in the Anax container.
$masun['title'] = "Presentation";

$masun['stylesheets'] = array('css/stylesheet.css');

$masun['javascript_include'] = array('js/carousel.js');

$menu = array(
  'callback' => 'CNavigation::modifyNavbar',
  'items' => array(
    'home'  => array('text'=>'Home',  'url'=>'?p=home', 'class'=>null),
    'away'  => array('text'=>'Away',  'url'=>'?p=away', 'class'=>null),
    'about' => array('text'=>'About', 'url'=>'?p=about', 'class'=>null),
  ),
);

$navigation = CNavigation::GenerateMenu($menu, 'cssmenu');

$masun['header'] = <<<EOD
	<div id='top-space-div'></div>
	{$navigation}
	<div id='title-wrapper'>
		<img src='img/logo.png' alt='Anax Logo'/>
		<div>
			<span>Masun webbtemplate</span>
			<p>Återanvändbara moduler för webbutveckling med PHP</p>
		</div>
	</div>
	<div id="carousel">
		<div><ul></ul></div>
	</div>
EOD;
 
$masun['main'] = <<<EOD
	<div id="middle-section">
		<p id="middle-section-title">En kort beskrivning om mig</p>
		<p id="middle-section-text">Mitt namn är Magnus Sundström och jag är 36 år gammal. Jag är uppväxt i Stockholmsområdet och föddes i Solna men flyttades senare till Ekerö där jag gick färdigt grundskola och gymnasium. Efter detta flyttades det runt i Stockholm, samtidgt som jag
			utbildade mig till fysiker via Stockholms Universitet. Inriktining som jag läste berörede ämnet programmering, men det var inte där som jag blev intresserad av detta ämne. Redan på gymnasiet hade jag fashinerats av att programmera min miniräknare som
			kunde fyllas med Assemblerliknande instruktioner. Det skulle dröja ett antal år innan jag började jobba inom programmering, och fick sin start inom inspektionsutrustinig för pappersindustrin. Det hela gick ut på att arbeta med ett program skrivet i
			Delphi som analyserade papprets struktur för att finna fel och snabbt kunna göra insatter. Senare har det även blivit en tur inom e-handel med ASP.NET och även kameraindustrin med bygge av mjukvaruladdning via en plattform skriven i Java. I min fritid
			så tycker jag om att läsa kureser på distans. Dels för att hålla uppdatera och hålla mina kunskaper flytande men dels för att kunna visa på papper att man kan någonting (eller åtminstånde är intresserad av något). I dagsläget är det svårt att finna
			tid för kurser och andra hobbyverksamheter som rör programmering då jag fått en son som i skrivandets stund är 3 månader gammal. Tillsammans med honom och min flickvän, bor vi strax söder om Stockholms innerstad. Förutom att programmera tycker jag
			om, som de flesta andra, att se film och lyssna på musik. Innan 3 månaders Lo, kunde man ofta finna mig på konserter eller i biosalongen. Vad jag hoppas få ut av denna kurs är lite mer insikt i PHP. Ett programspråk som jag inte hållt på med tidigare.
			Dock är jag välbekant med html, javascript och diverse backend-programmering, men det är långt ifrån något jag bemästrar fullt ut. Jag har stora förhoppningar på att kunna lyfta mina kunskaper genom denna kurs och dessutom försöka ha kul under tiden.</p>
	</div>
EOD;
 
$masun['footer'] = 
<<<EOD
	<div id="bottom-div">
		<div>
			<img src="img/Me_mini.png" alt="Selfie"/>
			<p>Magnus Sundström jobbar som utvecklare och utbildar sig vid sidan av. Han är mycket teknikintresserad och går just nu en kurs i webbutveckling.<br>
			<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
			<a href="sourcecode.php">Souce code</a>
			</p>
		</div>
	</div>	
EOD;
 
// Finally, leave it all to the rendering phase of Masun.
include(MASUN_THEME_PATH);

