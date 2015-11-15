/* This is a generated file. Do not edit *//*! URI.js v1.15.1 http://medialize.github.io/URI.js/ */
/* build contains: IPv6.js, punycode.js, SecondLevelDomains.js, URI.js, URITemplate.js */
(function(f,n){"object"===typeof exports?module.exports=n():"function"===typeof define&&define.amd?define(n):f.IPv6=n(f)})(this,function(f){var n=f&&f.IPv6;return{best:function(g){g=g.toLowerCase().split(":");var l=g.length,b=8;""===g[0]&&""===g[1]&&""===g[2]?(g.shift(),g.shift()):""===g[0]&&""===g[1]?g.shift():""===g[l-1]&&""===g[l-2]&&g.pop();l=g.length;-1!==g[l-1].indexOf(".")&&(b=7);var k;for(k=0;k<l&&""!==g[k];k++);if(k<b)for(g.splice(k,1,"0000");g.length<b;)g.splice(k,0,"0000");for(k=0;k<b;k++){for(var l=
g[k].split(""),f=0;3>f;f++)if("0"===l[0]&&1<l.length)l.splice(0,1);else break;g[k]=l.join("")}var l=-1,n=f=0,h=-1,u=!1;for(k=0;k<b;k++)u?"0"===g[k]?n+=1:(u=!1,n>f&&(l=h,f=n)):"0"===g[k]&&(u=!0,h=k,n=1);n>f&&(l=h,f=n);1<f&&g.splice(l,f,"");l=g.length;b="";""===g[0]&&(b=":");for(k=0;k<l;k++){b+=g[k];if(k===l-1)break;b+=":"}""===g[l-1]&&(b+=":");return b},noConflict:function(){f.IPv6===this&&(f.IPv6=n);return this}}});
(function(f){function n(b){throw RangeError(v[b]);}function g(b,e){for(var h=b.length;h--;)b[h]=e(b[h]);return b}function l(b,h){return g(b.split(e),h).join(".")}function b(b){for(var e=[],h=0,g=b.length,a,c;h<g;)a=b.charCodeAt(h++),55296<=a&&56319>=a&&h<g?(c=b.charCodeAt(h++),56320==(c&64512)?e.push(((a&1023)<<10)+(c&1023)+65536):(e.push(a),h--)):e.push(a);return e}function k(b){return g(b,function(b){var e="";65535<b&&(b-=65536,e+=x(b>>>10&1023|55296),b=56320|b&1023);return e+=x(b)}).join("")}function A(b,
e){return b+22+75*(26>b)-((0!=e)<<5)}function w(b,e,h){var g=0;b=h?q(b/700):b>>1;for(b+=q(b/e);455<b;g+=36)b=q(b/35);return q(g+36*b/(b+38))}function h(b){var e=[],h=b.length,g,a=0,c=128,d=72,m,z,y,f,l;m=b.lastIndexOf("-");0>m&&(m=0);for(z=0;z<m;++z)128<=b.charCodeAt(z)&&n("not-basic"),e.push(b.charCodeAt(z));for(m=0<m?m+1:0;m<h;){z=a;g=1;for(y=36;;y+=36){m>=h&&n("invalid-input");f=b.charCodeAt(m++);f=10>f-48?f-22:26>f-65?f-65:26>f-97?f-97:36;(36<=f||f>q((2147483647-a)/g))&&n("overflow");a+=f*g;l=
y<=d?1:y>=d+26?26:y-d;if(f<l)break;f=36-l;g>q(2147483647/f)&&n("overflow");g*=f}g=e.length+1;d=w(a-z,g,0==z);q(a/g)>2147483647-c&&n("overflow");c+=q(a/g);a%=g;e.splice(a++,0,c)}return k(e)}function u(e){var g,h,f,a,c,d,m,z,y,l=[],u,k,p;e=b(e);u=e.length;g=128;h=0;c=72;for(d=0;d<u;++d)y=e[d],128>y&&l.push(x(y));for((f=a=l.length)&&l.push("-");f<u;){m=2147483647;for(d=0;d<u;++d)y=e[d],y>=g&&y<m&&(m=y);k=f+1;m-g>q((2147483647-h)/k)&&n("overflow");h+=(m-g)*k;g=m;for(d=0;d<u;++d)if(y=e[d],y<g&&2147483647<
++h&&n("overflow"),y==g){z=h;for(m=36;;m+=36){y=m<=c?1:m>=c+26?26:m-c;if(z<y)break;p=z-y;z=36-y;l.push(x(A(y+p%z,0)));z=q(p/z)}l.push(x(A(z,0)));c=w(h,k,f==a);h=0;++f}++h;++g}return l.join("")}var D="object"==typeof exports&&exports,E="object"==typeof module&&module&&module.exports==D&&module,B="object"==typeof global&&global;if(B.global===B||B.window===B)f=B;var t,r=/^xn--/,p=/[^ -~]/,e=/\x2E|\u3002|\uFF0E|\uFF61/g,v={overflow:"Overflow: input needs wider integers to process","not-basic":"Illegal input >= 0x80 (not a basic code point)",
"invalid-input":"Invalid input"},q=Math.floor,x=String.fromCharCode,C;t={version:"1.2.3",ucs2:{decode:b,encode:k},decode:h,encode:u,toASCII:function(b){return l(b,function(b){return p.test(b)?"xn--"+u(b):b})},toUnicode:function(b){return l(b,function(b){return r.test(b)?h(b.slice(4).toLowerCase()):b})}};if("function"==typeof define&&"object"==typeof define.amd&&define.amd)define(function(){return t});else if(D&&!D.nodeType)if(E)E.exports=t;else for(C in t)t.hasOwnProperty(C)&&(D[C]=t[C]);else f.punycode=
t})(this);
(function(f,n){"object"===typeof exports?module.exports=n():"function"===typeof define&&define.amd?define(n):f.SecondLevelDomains=n(f)})(this,function(f){var n=f&&f.SecondLevelDomains,g={list:{ac:" com gov mil net org ",ae:" ac co gov mil name net org pro sch ",af:" com edu gov net org ",al:" com edu gov mil net org ",ao:" co ed gv it og pb ",ar:" com edu gob gov int mil net org tur ",at:" ac co gv or ",au:" asn com csiro edu gov id net org ",ba:" co com edu gov mil net org rs unbi unmo unsa untz unze ",bb:" biz co com edu gov info net org store tv ",
bh:" biz cc com edu gov info net org ",bn:" com edu gov net org ",bo:" com edu gob gov int mil net org tv ",br:" adm adv agr am arq art ato b bio blog bmd cim cng cnt com coop ecn edu eng esp etc eti far flog fm fnd fot fst g12 ggf gov imb ind inf jor jus lel mat med mil mus net nom not ntr odo org ppg pro psc psi qsl rec slg srv tmp trd tur tv vet vlog wiki zlg ",bs:" com edu gov net org ",bz:" du et om ov rg ",ca:" ab bc mb nb nf nl ns nt nu on pe qc sk yk ",ck:" biz co edu gen gov info net org ",
cn:" ac ah bj com cq edu fj gd gov gs gx gz ha hb he hi hl hn jl js jx ln mil net nm nx org qh sc sd sh sn sx tj tw xj xz yn zj ",co:" com edu gov mil net nom org ",cr:" ac c co ed fi go or sa ",cy:" ac biz com ekloges gov ltd name net org parliament press pro tm ","do":" art com edu gob gov mil net org sld web ",dz:" art asso com edu gov net org pol ",ec:" com edu fin gov info med mil net org pro ",eg:" com edu eun gov mil name net org sci ",er:" com edu gov ind mil net org rochest w ",es:" com edu gob nom org ",
et:" biz com edu gov info name net org ",fj:" ac biz com info mil name net org pro ",fk:" ac co gov net nom org ",fr:" asso com f gouv nom prd presse tm ",gg:" co net org ",gh:" com edu gov mil org ",gn:" ac com gov net org ",gr:" com edu gov mil net org ",gt:" com edu gob ind mil net org ",gu:" com edu gov net org ",hk:" com edu gov idv net org ",hu:" 2000 agrar bolt casino city co erotica erotika film forum games hotel info ingatlan jogasz konyvelo lakas media news org priv reklam sex shop sport suli szex tm tozsde utazas video ",
id:" ac co go mil net or sch web ",il:" ac co gov idf k12 muni net org ","in":" ac co edu ernet firm gen gov i ind mil net nic org res ",iq:" com edu gov i mil net org ",ir:" ac co dnssec gov i id net org sch ",it:" edu gov ",je:" co net org ",jo:" com edu gov mil name net org sch ",jp:" ac ad co ed go gr lg ne or ",ke:" ac co go info me mobi ne or sc ",kh:" com edu gov mil net org per ",ki:" biz com de edu gov info mob net org tel ",km:" asso com coop edu gouv k medecin mil nom notaires pharmaciens presse tm veterinaire ",
kn:" edu gov net org ",kr:" ac busan chungbuk chungnam co daegu daejeon es gangwon go gwangju gyeongbuk gyeonggi gyeongnam hs incheon jeju jeonbuk jeonnam k kg mil ms ne or pe re sc seoul ulsan ",kw:" com edu gov net org ",ky:" com edu gov net org ",kz:" com edu gov mil net org ",lb:" com edu gov net org ",lk:" assn com edu gov grp hotel int ltd net ngo org sch soc web ",lr:" com edu gov net org ",lv:" asn com conf edu gov id mil net org ",ly:" com edu gov id med net org plc sch ",ma:" ac co gov m net org press ",
mc:" asso tm ",me:" ac co edu gov its net org priv ",mg:" com edu gov mil nom org prd tm ",mk:" com edu gov inf name net org pro ",ml:" com edu gov net org presse ",mn:" edu gov org ",mo:" com edu gov net org ",mt:" com edu gov net org ",mv:" aero biz com coop edu gov info int mil museum name net org pro ",mw:" ac co com coop edu gov int museum net org ",mx:" com edu gob net org ",my:" com edu gov mil name net org sch ",nf:" arts com firm info net other per rec store web ",ng:" biz com edu gov mil mobi name net org sch ",
ni:" ac co com edu gob mil net nom org ",np:" com edu gov mil net org ",nr:" biz com edu gov info net org ",om:" ac biz co com edu gov med mil museum net org pro sch ",pe:" com edu gob mil net nom org sld ",ph:" com edu gov i mil net ngo org ",pk:" biz com edu fam gob gok gon gop gos gov net org web ",pl:" art bialystok biz com edu gda gdansk gorzow gov info katowice krakow lodz lublin mil net ngo olsztyn org poznan pwr radom slupsk szczecin torun warszawa waw wroc wroclaw zgora ",pr:" ac biz com edu est gov info isla name net org pro prof ",
ps:" com edu gov net org plo sec ",pw:" belau co ed go ne or ",ro:" arts com firm info nom nt org rec store tm www ",rs:" ac co edu gov in org ",sb:" com edu gov net org ",sc:" com edu gov net org ",sh:" co com edu gov net nom org ",sl:" com edu gov net org ",st:" co com consulado edu embaixada gov mil net org principe saotome store ",sv:" com edu gob org red ",sz:" ac co org ",tr:" av bbs bel biz com dr edu gen gov info k12 name net org pol tel tsk tv web ",tt:" aero biz cat co com coop edu gov info int jobs mil mobi museum name net org pro tel travel ",
tw:" club com ebiz edu game gov idv mil net org ",mu:" ac co com gov net or org ",mz:" ac co edu gov org ",na:" co com ",nz:" ac co cri geek gen govt health iwi maori mil net org parliament school ",pa:" abo ac com edu gob ing med net nom org sld ",pt:" com edu gov int net nome org publ ",py:" com edu gov mil net org ",qa:" com edu gov mil net org ",re:" asso com nom ",ru:" ac adygeya altai amur arkhangelsk astrakhan bashkiria belgorod bir bryansk buryatia cbg chel chelyabinsk chita chukotka chuvashia com dagestan e-burg edu gov grozny int irkutsk ivanovo izhevsk jar joshkar-ola kalmykia kaluga kamchatka karelia kazan kchr kemerovo khabarovsk khakassia khv kirov koenig komi kostroma kranoyarsk kuban kurgan kursk lipetsk magadan mari mari-el marine mil mordovia mosreg msk murmansk nalchik net nnov nov novosibirsk nsk omsk orenburg org oryol penza perm pp pskov ptz rnd ryazan sakhalin samara saratov simbirsk smolensk spb stavropol stv surgut tambov tatarstan tom tomsk tsaritsyn tsk tula tuva tver tyumen udm udmurtia ulan-ude vladikavkaz vladimir vladivostok volgograd vologda voronezh vrn vyatka yakutia yamal yekaterinburg yuzhno-sakhalinsk ",
rw:" ac co com edu gouv gov int mil net ",sa:" com edu gov med net org pub sch ",sd:" com edu gov info med net org tv ",se:" a ac b bd c d e f g h i k l m n o org p parti pp press r s t tm u w x y z ",sg:" com edu gov idn net org per ",sn:" art com edu gouv org perso univ ",sy:" com edu gov mil net news org ",th:" ac co go in mi net or ",tj:" ac biz co com edu go gov info int mil name net nic org test web ",tn:" agrinet com defense edunet ens fin gov ind info intl mincom nat net org perso rnrt rns rnu tourism ",
tz:" ac co go ne or ",ua:" biz cherkassy chernigov chernovtsy ck cn co com crimea cv dn dnepropetrovsk donetsk dp edu gov if in ivano-frankivsk kh kharkov kherson khmelnitskiy kiev kirovograd km kr ks kv lg lugansk lutsk lviv me mk net nikolaev od odessa org pl poltava pp rovno rv sebastopol sumy te ternopil uzhgorod vinnica vn zaporizhzhe zhitomir zp zt ",ug:" ac co go ne or org sc ",uk:" ac bl british-library co cym gov govt icnet jet lea ltd me mil mod national-library-scotland nel net nhs nic nls org orgn parliament plc police sch scot soc ",
us:" dni fed isa kids nsn ",uy:" com edu gub mil net org ",ve:" co com edu gob info mil net org web ",vi:" co com k12 net org ",vn:" ac biz com edu gov health info int name net org pro ",ye:" co com gov ltd me net org plc ",yu:" ac co edu gov org ",za:" ac agric alt bourse city co cybernet db edu gov grondar iaccess imt inca landesign law mil net ngo nis nom olivetti org pix school tm web ",zm:" ac co com edu gov net org sch "},has:function(f){var b=f.lastIndexOf(".");if(0>=b||b>=f.length-1)return!1;
var k=f.lastIndexOf(".",b-1);if(0>=k||k>=b-1)return!1;var n=g.list[f.slice(b+1)];return n?0<=n.indexOf(" "+f.slice(k+1,b)+" "):!1},is:function(f){var b=f.lastIndexOf(".");if(0>=b||b>=f.length-1||0<=f.lastIndexOf(".",b-1))return!1;var k=g.list[f.slice(b+1)];return k?0<=k.indexOf(" "+f.slice(0,b)+" "):!1},get:function(f){var b=f.lastIndexOf(".");if(0>=b||b>=f.length-1)return null;var k=f.lastIndexOf(".",b-1);if(0>=k||k>=b-1)return null;var n=g.list[f.slice(b+1)];return!n||0>n.indexOf(" "+f.slice(k+
1,b)+" ")?null:f.slice(k+1)},noConflict:function(){f.SecondLevelDomains===this&&(f.SecondLevelDomains=n);return this}};return g});
(function(f,n){"object"===typeof exports?module.exports=n(require("./punycode"),require("./IPv6"),require("./SecondLevelDomains")):"function"===typeof define&&define.amd?define(["./punycode","./IPv6","./SecondLevelDomains"],n):f.URI=n(f.punycode,f.IPv6,f.SecondLevelDomains,f)})(this,function(f,n,g,l){function b(a,c){var d=1<=arguments.length,m=2<=arguments.length;if(!(this instanceof b))return d?m?new b(a,c):new b(a):new b;if(void 0===a){if(d)throw new TypeError("undefined is not a valid argument for URI");
a="undefined"!==typeof location?location.href+"":""}this.href(a);return void 0!==c?this.absoluteTo(c):this}function k(a){return a.replace(/([.*+?^=!:${}()|[\]\/\\])/g,"\\$1")}function A(a){return void 0===a?"Undefined":String(Object.prototype.toString.call(a)).slice(8,-1)}function w(a){return"Array"===A(a)}function h(a,c){var d={},b,e;if("RegExp"===A(c))d=null;else if(w(c))for(b=0,e=c.length;b<e;b++)d[c[b]]=!0;else d[c]=!0;b=0;for(e=a.length;b<e;b++)if(d&&void 0!==d[a[b]]||!d&&c.test(a[b]))a.splice(b,
1),e--,b--;return a}function u(a,c){var d,b;if(w(c)){d=0;for(b=c.length;d<b;d++)if(!u(a,c[d]))return!1;return!0}var e=A(c);d=0;for(b=a.length;d<b;d++)if("RegExp"===e){if("string"===typeof a[d]&&a[d].match(c))return!0}else if(a[d]===c)return!0;return!1}function D(a,c){if(!w(a)||!w(c)||a.length!==c.length)return!1;a.sort();c.sort();for(var d=0,b=a.length;d<b;d++)if(a[d]!==c[d])return!1;return!0}function E(a){return escape(a)}function B(a){return encodeURIComponent(a).replace(/[!'()*]/g,E).replace(/\*/g,
"%2A")}function t(a){return function(c,d){if(void 0===c)return this._parts[a]||"";this._parts[a]=c||null;this.build(!d);return this}}function r(a,c){return function(d,b){if(void 0===d)return this._parts[a]||"";null!==d&&(d+="",d.charAt(0)===c&&(d=d.substring(1)));this._parts[a]=d;this.build(!b);return this}}var p=l&&l.URI;b.version="1.15.1";var e=b.prototype,v=Object.prototype.hasOwnProperty;b._parts=function(){return{protocol:null,username:null,password:null,hostname:null,urn:null,port:null,path:null,
query:null,fragment:null,duplicateQueryParameters:b.duplicateQueryParameters,escapeQuerySpace:b.escapeQuerySpace}};b.duplicateQueryParameters=!1;b.escapeQuerySpace=!0;b.protocol_expression=/^[a-z][a-z0-9.+-]*$/i;b.idn_expression=/[^a-z0-9\.-]/i;b.punycode_expression=/(xn--)/i;b.ip4_expression=/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;b.ip6_expression=/^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$/;
b.find_uri_expression=/\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?\u00ab\u00bb\u201c\u201d\u2018\u2019]))/ig;b.findUri={start:/\b(?:([a-z][a-z0-9.+-]*:\/\/)|www\.)/gi,end:/[\s\r\n]|$/,trim:/[`!()\[\]{};:'".,<>?\u00ab\u00bb\u201c\u201d\u201e\u2018\u2019]+$/};b.defaultPorts={http:"80",https:"443",ftp:"21",gopher:"70",ws:"80",wss:"443"};b.invalid_hostname_characters=
/[^a-zA-Z0-9\.-]/;b.domAttributes={a:"href",blockquote:"cite",link:"href",base:"href",script:"src",form:"action",img:"src",area:"href",iframe:"src",embed:"src",source:"src",track:"src",input:"src",audio:"src",video:"src"};b.getDomAttribute=function(a){if(a&&a.nodeName){var c=a.nodeName.toLowerCase();return"input"===c&&"image"!==a.type?void 0:b.domAttributes[c]}};b.encode=B;b.decode=decodeURIComponent;b.iso8859=function(){b.encode=escape;b.decode=unescape};b.unicode=function(){b.encode=B;b.decode=
decodeURIComponent};b.characters={pathname:{encode:{expression:/%(24|26|2B|2C|3B|3D|3A|40)/ig,map:{"%24":"$","%26":"&","%2B":"+","%2C":",","%3B":";","%3D":"=","%3A":":","%40":"@"}},decode:{expression:/[\/\?#]/g,map:{"/":"%2F","?":"%3F","#":"%23"}}},reserved:{encode:{expression:/%(21|23|24|26|27|28|29|2A|2B|2C|2F|3A|3B|3D|3F|40|5B|5D)/ig,map:{"%3A":":","%2F":"/","%3F":"?","%23":"#","%5B":"[","%5D":"]","%40":"@","%21":"!","%24":"$","%26":"&","%27":"'","%28":"(","%29":")","%2A":"*","%2B":"+","%2C":",",
"%3B":";","%3D":"="}}},urnpath:{encode:{expression:/%(21|24|27|28|29|2A|2B|2C|3B|3D|40)/ig,map:{"%21":"!","%24":"$","%27":"'","%28":"(","%29":")","%2A":"*","%2B":"+","%2C":",","%3B":";","%3D":"=","%40":"@"}},decode:{expression:/[\/\?#:]/g,map:{"/":"%2F","?":"%3F","#":"%23",":":"%3A"}}}};b.encodeQuery=function(a,c){var d=b.encode(a+"");void 0===c&&(c=b.escapeQuerySpace);return c?d.replace(/%20/g,"+"):d};b.decodeQuery=function(a,c){a+="";void 0===c&&(c=b.escapeQuerySpace);try{return b.decode(c?a.replace(/\+/g,
"%20"):a)}catch(d){return a}};var q={encode:"encode",decode:"decode"},x,C=function(a,c){return function(d){try{return b[c](d+"").replace(b.characters[a][c].expression,function(d){return b.characters[a][c].map[d]})}catch(m){return d}}};for(x in q)b[x+"PathSegment"]=C("pathname",q[x]),b[x+"UrnPathSegment"]=C("urnpath",q[x]);q=function(a,c,d){return function(m){var e;e=d?function(a){return b[c](b[d](a))}:b[c];m=(m+"").split(a);for(var f=0,h=m.length;f<h;f++)m[f]=e(m[f]);return m.join(a)}};b.decodePath=
q("/","decodePathSegment");b.decodeUrnPath=q(":","decodeUrnPathSegment");b.recodePath=q("/","encodePathSegment","decode");b.recodeUrnPath=q(":","encodeUrnPathSegment","decode");b.encodeReserved=C("reserved","encode");b.parse=function(a,c){var d;c||(c={});d=a.indexOf("#");-1<d&&(c.fragment=a.substring(d+1)||null,a=a.substring(0,d));d=a.indexOf("?");-1<d&&(c.query=a.substring(d+1)||null,a=a.substring(0,d));"//"===a.substring(0,2)?(c.protocol=null,a=a.substring(2),a=b.parseAuthority(a,c)):(d=a.indexOf(":"),
-1<d&&(c.protocol=a.substring(0,d)||null,c.protocol&&!c.protocol.match(b.protocol_expression)?c.protocol=void 0:"//"===a.substring(d+1,d+3)?(a=a.substring(d+3),a=b.parseAuthority(a,c)):(a=a.substring(d+1),c.urn=!0)));c.path=a;return c};b.parseHost=function(a,c){var d=a.indexOf("/"),b;-1===d&&(d=a.length);if("["===a.charAt(0))b=a.indexOf("]"),c.hostname=a.substring(1,b)||null,c.port=a.substring(b+2,d)||null,"/"===c.port&&(c.port=null);else{var e=a.indexOf(":");b=a.indexOf("/");e=a.indexOf(":",e+1);
-1!==e&&(-1===b||e<b)?(c.hostname=a.substring(0,d)||null,c.port=null):(b=a.substring(0,d).split(":"),c.hostname=b[0]||null,c.port=b[1]||null)}c.hostname&&"/"!==a.substring(d).charAt(0)&&(d++,a="/"+a);return a.substring(d)||"/"};b.parseAuthority=function(a,c){a=b.parseUserinfo(a,c);return b.parseHost(a,c)};b.parseUserinfo=function(a,c){var d=a.indexOf("/"),m=a.lastIndexOf("@",-1<d?d:a.length-1);-1<m&&(-1===d||m<d)?(d=a.substring(0,m).split(":"),c.username=d[0]?b.decode(d[0]):null,d.shift(),c.password=
d[0]?b.decode(d.join(":")):null,a=a.substring(m+1)):(c.username=null,c.password=null);return a};b.parseQuery=function(a,c){if(!a)return{};a=a.replace(/&+/g,"&").replace(/^\?*&*|&+$/g,"");if(!a)return{};for(var d={},m=a.split("&"),e=m.length,f,h,g=0;g<e;g++)f=m[g].split("="),h=b.decodeQuery(f.shift(),c),f=f.length?b.decodeQuery(f.join("="),c):null,v.call(d,h)?("string"===typeof d[h]&&(d[h]=[d[h]]),d[h].push(f)):d[h]=f;return d};b.build=function(a){var c="";a.protocol&&(c+=a.protocol+":");a.urn||!c&&
!a.hostname||(c+="//");c+=b.buildAuthority(a)||"";"string"===typeof a.path&&("/"!==a.path.charAt(0)&&"string"===typeof a.hostname&&(c+="/"),c+=a.path);"string"===typeof a.query&&a.query&&(c+="?"+a.query);"string"===typeof a.fragment&&a.fragment&&(c+="#"+a.fragment);return c};b.buildHost=function(a){var c="";if(a.hostname)c=b.ip6_expression.test(a.hostname)?c+("["+a.hostname+"]"):c+a.hostname;else return"";a.port&&(c+=":"+a.port);return c};b.buildAuthority=function(a){return b.buildUserinfo(a)+b.buildHost(a)};
b.buildUserinfo=function(a){var c="";a.username&&(c+=b.encode(a.username),a.password&&(c+=":"+b.encode(a.password)),c+="@");return c};b.buildQuery=function(a,c,d){var m="",e,f,h,g;for(f in a)if(v.call(a,f)&&f)if(w(a[f]))for(e={},h=0,g=a[f].length;h<g;h++)void 0!==a[f][h]&&void 0===e[a[f][h]+""]&&(m+="&"+b.buildQueryParameter(f,a[f][h],d),!0!==c&&(e[a[f][h]+""]=!0));else void 0!==a[f]&&(m+="&"+b.buildQueryParameter(f,a[f],d));return m.substring(1)};b.buildQueryParameter=function(a,c,d){return b.encodeQuery(a,
d)+(null!==c?"="+b.encodeQuery(c,d):"")};b.addQuery=function(a,c,d){if("object"===typeof c)for(var m in c)v.call(c,m)&&b.addQuery(a,m,c[m]);else if("string"===typeof c)void 0===a[c]?a[c]=d:("string"===typeof a[c]&&(a[c]=[a[c]]),w(d)||(d=[d]),a[c]=(a[c]||[]).concat(d));else throw new TypeError("URI.addQuery() accepts an object, string as the name parameter");};b.removeQuery=function(a,c,d){var m;if(w(c))for(d=0,m=c.length;d<m;d++)a[c[d]]=void 0;else if("RegExp"===A(c))for(m in a)c.test(m)&&(a[m]=void 0);
else if("object"===typeof c)for(m in c)v.call(c,m)&&b.removeQuery(a,m,c[m]);else if("string"===typeof c)void 0!==d?"RegExp"===A(d)?!w(a[c])&&d.test(a[c])?a[c]=void 0:a[c]=h(a[c],d):a[c]===d?a[c]=void 0:w(a[c])&&(a[c]=h(a[c],d)):a[c]=void 0;else throw new TypeError("URI.removeQuery() accepts an object, string, RegExp as the first parameter");};b.hasQuery=function(a,c,d,m){if("object"===typeof c){for(var e in c)if(v.call(c,e)&&!b.hasQuery(a,e,c[e]))return!1;return!0}if("string"!==typeof c)throw new TypeError("URI.hasQuery() accepts an object, string as the name parameter");
switch(A(d)){case "Undefined":return c in a;case "Boolean":return a=Boolean(w(a[c])?a[c].length:a[c]),d===a;case "Function":return!!d(a[c],c,a);case "Array":return w(a[c])?(m?u:D)(a[c],d):!1;case "RegExp":return w(a[c])?m?u(a[c],d):!1:Boolean(a[c]&&a[c].match(d));case "Number":d=String(d);case "String":return w(a[c])?m?u(a[c],d):!1:a[c]===d;default:throw new TypeError("URI.hasQuery() accepts undefined, boolean, string, number, RegExp, Function as the value parameter");}};b.commonPath=function(a,c){var d=
Math.min(a.length,c.length),b;for(b=0;b<d;b++)if(a.charAt(b)!==c.charAt(b)){b--;break}if(1>b)return a.charAt(0)===c.charAt(0)&&"/"===a.charAt(0)?"/":"";if("/"!==a.charAt(b)||"/"!==c.charAt(b))b=a.substring(0,b).lastIndexOf("/");return a.substring(0,b+1)};b.withinString=function(a,c,d){d||(d={});var m=d.start||b.findUri.start,e=d.end||b.findUri.end,f=d.trim||b.findUri.trim,h=/[a-z0-9-]=["']?$/i;for(m.lastIndex=0;;){var g=m.exec(a);if(!g)break;g=g.index;if(d.ignoreHtml){var u=a.slice(Math.max(g-3,0),
g);if(u&&h.test(u))continue}var u=g+a.slice(g).search(e),k=a.slice(g,u).replace(f,"");d.ignore&&d.ignore.test(k)||(u=g+k.length,k=c(k,g,u,a),a=a.slice(0,g)+k+a.slice(u),m.lastIndex=g+k.length)}m.lastIndex=0;return a};b.ensureValidHostname=function(a){if(a.match(b.invalid_hostname_characters)){if(!f)throw new TypeError('Hostname "'+a+'" contains characters other than [A-Z0-9.-] and Punycode.js is not available');if(f.toASCII(a).match(b.invalid_hostname_characters))throw new TypeError('Hostname "'+
a+'" contains characters other than [A-Z0-9.-]');}};b.noConflict=function(a){if(a)return a={URI:this.noConflict()},l.URITemplate&&"function"===typeof l.URITemplate.noConflict&&(a.URITemplate=l.URITemplate.noConflict()),l.IPv6&&"function"===typeof l.IPv6.noConflict&&(a.IPv6=l.IPv6.noConflict()),l.SecondLevelDomains&&"function"===typeof l.SecondLevelDomains.noConflict&&(a.SecondLevelDomains=l.SecondLevelDomains.noConflict()),a;l.URI===this&&(l.URI=p);return this};e.build=function(a){if(!0===a)this._deferred_build=
!0;else if(void 0===a||this._deferred_build)this._string=b.build(this._parts),this._deferred_build=!1;return this};e.clone=function(){return new b(this)};e.valueOf=e.toString=function(){return this.build(!1)._string};e.protocol=t("protocol");e.username=t("username");e.password=t("password");e.hostname=t("hostname");e.port=t("port");e.query=r("query","?");e.fragment=r("fragment","#");e.search=function(a,c){var b=this.query(a,c);return"string"===typeof b&&b.length?"?"+b:b};e.hash=function(a,c){var b=
this.fragment(a,c);return"string"===typeof b&&b.length?"#"+b:b};e.pathname=function(a,c){if(void 0===a||!0===a){var d=this._parts.path||(this._parts.hostname?"/":"");return a?(this._parts.urn?b.decodeUrnPath:b.decodePath)(d):d}this._parts.path=this._parts.urn?a?b.recodeUrnPath(a):"":a?b.recodePath(a):"/";this.build(!c);return this};e.path=e.pathname;e.href=function(a,c){var d;if(void 0===a)return this.toString();this._string="";this._parts=b._parts();var e=a instanceof b,f="object"===typeof a&&(a.hostname||
a.path||a.pathname);a.nodeName&&(f=b.getDomAttribute(a),a=a[f]||"",f=!1);!e&&f&&void 0!==a.pathname&&(a=a.toString());if("string"===typeof a||a instanceof String)this._parts=b.parse(String(a),this._parts);else if(e||f)for(d in e=e?a._parts:a,e)v.call(this._parts,d)&&(this._parts[d]=e[d]);else throw new TypeError("invalid input");this.build(!c);return this};e.is=function(a){var c=!1,d=!1,e=!1,f=!1,h=!1,u=!1,k=!1,l=!this._parts.urn;this._parts.hostname&&(l=!1,d=b.ip4_expression.test(this._parts.hostname),
e=b.ip6_expression.test(this._parts.hostname),c=d||e,h=(f=!c)&&g&&g.has(this._parts.hostname),u=f&&b.idn_expression.test(this._parts.hostname),k=f&&b.punycode_expression.test(this._parts.hostname));switch(a.toLowerCase()){case "relative":return l;case "absolute":return!l;case "domain":case "name":return f;case "sld":return h;case "ip":return c;case "ip4":case "ipv4":case "inet4":return d;case "ip6":case "ipv6":case "inet6":return e;case "idn":return u;case "url":return!this._parts.urn;case "urn":return!!this._parts.urn;
case "punycode":return k}return null};var F=e.protocol,G=e.port,H=e.hostname;e.protocol=function(a,c){if(void 0!==a&&a&&(a=a.replace(/:(\/\/)?$/,""),!a.match(b.protocol_expression)))throw new TypeError('Protocol "'+a+"\" contains characters other than [A-Z0-9.+-] or doesn't start with [A-Z]");return F.call(this,a,c)};e.scheme=e.protocol;e.port=function(a,c){if(this._parts.urn)return void 0===a?"":this;if(void 0!==a&&(0===a&&(a=null),a&&(a+="",":"===a.charAt(0)&&(a=a.substring(1)),a.match(/[^0-9]/))))throw new TypeError('Port "'+
a+'" contains characters other than [0-9]');return G.call(this,a,c)};e.hostname=function(a,c){if(this._parts.urn)return void 0===a?"":this;if(void 0!==a){var d={};b.parseHost(a,d);a=d.hostname}return H.call(this,a,c)};e.host=function(a,c){if(this._parts.urn)return void 0===a?"":this;if(void 0===a)return this._parts.hostname?b.buildHost(this._parts):"";b.parseHost(a,this._parts);this.build(!c);return this};e.authority=function(a,c){if(this._parts.urn)return void 0===a?"":this;if(void 0===a)return this._parts.hostname?
b.buildAuthority(this._parts):"";b.parseAuthority(a,this._parts);this.build(!c);return this};e.userinfo=function(a,c){if(this._parts.urn)return void 0===a?"":this;if(void 0===a){if(!this._parts.username)return"";var d=b.buildUserinfo(this._parts);return d.substring(0,d.length-1)}"@"!==a[a.length-1]&&(a+="@");b.parseUserinfo(a,this._parts);this.build(!c);return this};e.resource=function(a,c){var d;if(void 0===a)return this.path()+this.search()+this.hash();d=b.parse(a);this._parts.path=d.path;this._parts.query=
d.query;this._parts.fragment=d.fragment;this.build(!c);return this};e.subdomain=function(a,c){if(this._parts.urn)return void 0===a?"":this;if(void 0===a){if(!this._parts.hostname||this.is("IP"))return"";var d=this._parts.hostname.length-this.domain().length-1;return this._parts.hostname.substring(0,d)||""}d=this._parts.hostname.length-this.domain().length;d=this._parts.hostname.substring(0,d);d=new RegExp("^"+k(d));a&&"."!==a.charAt(a.length-1)&&(a+=".");a&&b.ensureValidHostname(a);this._parts.hostname=
this._parts.hostname.replace(d,a);this.build(!c);return this};e.domain=function(a,c){if(this._parts.urn)return void 0===a?"":this;"boolean"===typeof a&&(c=a,a=void 0);if(void 0===a){if(!this._parts.hostname||this.is("IP"))return"";var d=this._parts.hostname.match(/\./g);if(d&&2>d.length)return this._parts.hostname;d=this._parts.hostname.length-this.tld(c).length-1;d=this._parts.hostname.lastIndexOf(".",d-1)+1;return this._parts.hostname.substring(d)||""}if(!a)throw new TypeError("cannot set domain empty");
b.ensureValidHostname(a);!this._parts.hostname||this.is("IP")?this._parts.hostname=a:(d=new RegExp(k(this.domain())+"$"),this._parts.hostname=this._parts.hostname.replace(d,a));this.build(!c);return this};e.tld=function(a,c){if(this._parts.urn)return void 0===a?"":this;"boolean"===typeof a&&(c=a,a=void 0);if(void 0===a){if(!this._parts.hostname||this.is("IP"))return"";var b=this._parts.hostname.lastIndexOf("."),b=this._parts.hostname.substring(b+1);return!0!==c&&g&&g.list[b.toLowerCase()]?g.get(this._parts.hostname)||
b:b}if(a)if(a.match(/[^a-zA-Z0-9-]/))if(g&&g.is(a))b=new RegExp(k(this.tld())+"$"),this._parts.hostname=this._parts.hostname.replace(b,a);else throw new TypeError('TLD "'+a+'" contains characters other than [A-Z0-9]');else{if(!this._parts.hostname||this.is("IP"))throw new ReferenceError("cannot set TLD on non-domain host");b=new RegExp(k(this.tld())+"$");this._parts.hostname=this._parts.hostname.replace(b,a)}else throw new TypeError("cannot set TLD empty");this.build(!c);return this};e.directory=
function(a,c){if(this._parts.urn)return void 0===a?"":this;if(void 0===a||!0===a){if(!this._parts.path&&!this._parts.hostname)return"";if("/"===this._parts.path)return"/";var d=this._parts.path.length-this.filename().length-1,d=this._parts.path.substring(0,d)||(this._parts.hostname?"/":"");return a?b.decodePath(d):d}d=this._parts.path.length-this.filename().length;d=this._parts.path.substring(0,d);d=new RegExp("^"+k(d));this.is("relative")||(a||(a="/"),"/"!==a.charAt(0)&&(a="/"+a));a&&"/"!==a.charAt(a.length-
1)&&(a+="/");a=b.recodePath(a);this._parts.path=this._parts.path.replace(d,a);this.build(!c);return this};e.filename=function(a,c){if(this._parts.urn)return void 0===a?"":this;if(void 0===a||!0===a){if(!this._parts.path||"/"===this._parts.path)return"";var d=this._parts.path.lastIndexOf("/"),d=this._parts.path.substring(d+1);return a?b.decodePathSegment(d):d}d=!1;"/"===a.charAt(0)&&(a=a.substring(1));a.match(/\.?\//)&&(d=!0);var e=new RegExp(k(this.filename())+"$");a=b.recodePath(a);this._parts.path=
this._parts.path.replace(e,a);d?this.normalizePath(c):this.build(!c);return this};e.suffix=function(a,c){if(this._parts.urn)return void 0===a?"":this;if(void 0===a||!0===a){if(!this._parts.path||"/"===this._parts.path)return"";var d=this.filename(),e=d.lastIndexOf(".");if(-1===e)return"";d=d.substring(e+1);d=/^[a-z0-9%]+$/i.test(d)?d:"";return a?b.decodePathSegment(d):d}"."===a.charAt(0)&&(a=a.substring(1));if(d=this.suffix())e=a?new RegExp(k(d)+"$"):new RegExp(k("."+d)+"$");else{if(!a)return this;
this._parts.path+="."+b.recodePath(a)}e&&(a=b.recodePath(a),this._parts.path=this._parts.path.replace(e,a));this.build(!c);return this};e.segment=function(a,c,b){var e=this._parts.urn?":":"/",f=this.path(),h="/"===f.substring(0,1),f=f.split(e);void 0!==a&&"number"!==typeof a&&(b=c,c=a,a=void 0);if(void 0!==a&&"number"!==typeof a)throw Error('Bad segment "'+a+'", must be 0-based integer');h&&f.shift();0>a&&(a=Math.max(f.length+a,0));if(void 0===c)return void 0===a?f:f[a];if(null===a||void 0===f[a])if(w(c)){f=
[];a=0;for(var g=c.length;a<g;a++)if(c[a].length||f.length&&f[f.length-1].length)f.length&&!f[f.length-1].length&&f.pop(),f.push(c[a])}else{if(c||"string"===typeof c)""===f[f.length-1]?f[f.length-1]=c:f.push(c)}else c?f[a]=c:f.splice(a,1);h&&f.unshift("");return this.path(f.join(e),b)};e.segmentCoded=function(a,c,d){var e,f;"number"!==typeof a&&(d=c,c=a,a=void 0);if(void 0===c){a=this.segment(a,c,d);if(w(a))for(e=0,f=a.length;e<f;e++)a[e]=b.decode(a[e]);else a=void 0!==a?b.decode(a):void 0;return a}if(w(c))for(e=
0,f=c.length;e<f;e++)c[e]=b.decode(c[e]);else c="string"===typeof c||c instanceof String?b.encode(c):c;return this.segment(a,c,d)};var I=e.query;e.query=function(a,c){if(!0===a)return b.parseQuery(this._parts.query,this._parts.escapeQuerySpace);if("function"===typeof a){var d=b.parseQuery(this._parts.query,this._parts.escapeQuerySpace),e=a.call(this,d);this._parts.query=b.buildQuery(e||d,this._parts.duplicateQueryParameters,this._parts.escapeQuerySpace);this.build(!c);return this}return void 0!==
a&&"string"!==typeof a?(this._parts.query=b.buildQuery(a,this._parts.duplicateQueryParameters,this._parts.escapeQuerySpace),this.build(!c),this):I.call(this,a,c)};e.setQuery=function(a,c,d){var e=b.parseQuery(this._parts.query,this._parts.escapeQuerySpace);if("string"===typeof a||a instanceof String)e[a]=void 0!==c?c:null;else if("object"===typeof a)for(var f in a)v.call(a,f)&&(e[f]=a[f]);else throw new TypeError("URI.addQuery() accepts an object, string as the name parameter");this._parts.query=
b.buildQuery(e,this._parts.duplicateQueryParameters,this._parts.escapeQuerySpace);"string"!==typeof a&&(d=c);this.build(!d);return this};e.addQuery=function(a,c,d){var e=b.parseQuery(this._parts.query,this._parts.escapeQuerySpace);b.addQuery(e,a,void 0===c?null:c);this._parts.query=b.buildQuery(e,this._parts.duplicateQueryParameters,this._parts.escapeQuerySpace);"string"!==typeof a&&(d=c);this.build(!d);return this};e.removeQuery=function(a,c,d){var e=b.parseQuery(this._parts.query,this._parts.escapeQuerySpace);
b.removeQuery(e,a,c);this._parts.query=b.buildQuery(e,this._parts.duplicateQueryParameters,this._parts.escapeQuerySpace);"string"!==typeof a&&(d=c);this.build(!d);return this};e.hasQuery=function(a,c,d){var e=b.parseQuery(this._parts.query,this._parts.escapeQuerySpace);return b.hasQuery(e,a,c,d)};e.setSearch=e.setQuery;e.addSearch=e.addQuery;e.removeSearch=e.removeQuery;e.hasSearch=e.hasQuery;e.normalize=function(){return this._parts.urn?this.normalizeProtocol(!1).normalizePath(!1).normalizeQuery(!1).normalizeFragment(!1).build():
this.normalizeProtocol(!1).normalizeHostname(!1).normalizePort(!1).normalizePath(!1).normalizeQuery(!1).normalizeFragment(!1).build()};e.normalizeProtocol=function(a){"string"===typeof this._parts.protocol&&(this._parts.protocol=this._parts.protocol.toLowerCase(),this.build(!a));return this};e.normalizeHostname=function(a){this._parts.hostname&&(this.is("IDN")&&f?this._parts.hostname=f.toASCII(this._parts.hostname):this.is("IPv6")&&n&&(this._parts.hostname=n.best(this._parts.hostname)),this._parts.hostname=
this._parts.hostname.toLowerCase(),this.build(!a));return this};e.normalizePort=function(a){"string"===typeof this._parts.protocol&&this._parts.port===b.defaultPorts[this._parts.protocol]&&(this._parts.port=null,this.build(!a));return this};e.normalizePath=function(a){var c=this._parts.path;if(!c)return this;if(this._parts.urn)return this._parts.path=b.recodeUrnPath(this._parts.path),this.build(!a),this;if("/"===this._parts.path)return this;var d,e="",f,h;"/"!==c.charAt(0)&&(d=!0,c="/"+c);c=c.replace(/(\/(\.\/)+)|(\/\.$)/g,
"/").replace(/\/{2,}/g,"/");d&&(e=c.substring(1).match(/^(\.\.\/)+/)||"")&&(e=e[0]);for(;;){f=c.indexOf("/..");if(-1===f)break;else if(0===f){c=c.substring(3);continue}h=c.substring(0,f).lastIndexOf("/");-1===h&&(h=f);c=c.substring(0,h)+c.substring(f+3)}d&&this.is("relative")&&(c=e+c.substring(1));c=b.recodePath(c);this._parts.path=c;this.build(!a);return this};e.normalizePathname=e.normalizePath;e.normalizeQuery=function(a){"string"===typeof this._parts.query&&(this._parts.query.length?this.query(b.parseQuery(this._parts.query,
this._parts.escapeQuerySpace)):this._parts.query=null,this.build(!a));return this};e.normalizeFragment=function(a){this._parts.fragment||(this._parts.fragment=null,this.build(!a));return this};e.normalizeSearch=e.normalizeQuery;e.normalizeHash=e.normalizeFragment;e.iso8859=function(){var a=b.encode,c=b.decode;b.encode=escape;b.decode=decodeURIComponent;try{this.normalize()}finally{b.encode=a,b.decode=c}return this};e.unicode=function(){var a=b.encode,c=b.decode;b.encode=B;b.decode=unescape;try{this.normalize()}finally{b.encode=
a,b.decode=c}return this};e.readable=function(){var a=this.clone();a.username("").password("").normalize();var c="";a._parts.protocol&&(c+=a._parts.protocol+"://");a._parts.hostname&&(a.is("punycode")&&f?(c+=f.toUnicode(a._parts.hostname),a._parts.port&&(c+=":"+a._parts.port)):c+=a.host());a._parts.hostname&&a._parts.path&&"/"!==a._parts.path.charAt(0)&&(c+="/");c+=a.path(!0);if(a._parts.query){for(var d="",e=0,h=a._parts.query.split("&"),g=h.length;e<g;e++){var u=(h[e]||"").split("="),d=d+("&"+b.decodeQuery(u[0],
this._parts.escapeQuerySpace).replace(/&/g,"%26"));void 0!==u[1]&&(d+="="+b.decodeQuery(u[1],this._parts.escapeQuerySpace).replace(/&/g,"%26"))}c+="?"+d.substring(1)}return c+=b.decodeQuery(a.hash(),!0)};e.absoluteTo=function(a){var c=this.clone(),d=["protocol","username","password","hostname","port"],e,f;if(this._parts.urn)throw Error("URNs do not have any generally defined hierarchical components");a instanceof b||(a=new b(a));c._parts.protocol||(c._parts.protocol=a._parts.protocol);if(this._parts.hostname)return c;
for(e=0;f=d[e];e++)c._parts[f]=a._parts[f];c._parts.path?".."===c._parts.path.substring(-2)&&(c._parts.path+="/"):(c._parts.path=a._parts.path,c._parts.query||(c._parts.query=a._parts.query));"/"!==c.path().charAt(0)&&(d=(d=a.directory())?d:0===a.path().indexOf("/")?"/":"",c._parts.path=(d?d+"/":"")+c._parts.path,c.normalizePath());c.build();return c};e.relativeTo=function(a){var c=this.clone().normalize(),d,e,f,h;if(c._parts.urn)throw Error("URNs do not have any generally defined hierarchical components");
a=(new b(a)).normalize();d=c._parts;e=a._parts;f=c.path();h=a.path();if("/"!==f.charAt(0))throw Error("URI is already relative");if("/"!==h.charAt(0))throw Error("Cannot calculate a URI relative to another relative URI");d.protocol===e.protocol&&(d.protocol=null);if(d.username===e.username&&d.password===e.password&&null===d.protocol&&null===d.username&&null===d.password&&d.hostname===e.hostname&&d.port===e.port)d.hostname=null,d.port=null;else return c.build();if(f===h)return d.path="",c.build();
a=b.commonPath(c.path(),a.path());if(!a)return c.build();e=e.path.substring(a.length).replace(/[^\/]*$/,"").replace(/.*?\//g,"../");d.path=e+d.path.substring(a.length);return c.build()};e.equals=function(a){var c=this.clone();a=new b(a);var d={},e={},f={},h;c.normalize();a.normalize();if(c.toString()===a.toString())return!0;d=c.query();e=a.query();c.query("");a.query("");if(c.toString()!==a.toString()||d.length!==e.length)return!1;d=b.parseQuery(d,this._parts.escapeQuerySpace);e=b.parseQuery(e,this._parts.escapeQuerySpace);
for(h in d)if(v.call(d,h)){if(!w(d[h])){if(d[h]!==e[h])return!1}else if(!D(d[h],e[h]))return!1;f[h]=!0}for(h in e)if(v.call(e,h)&&!f[h])return!1;return!0};e.duplicateQueryParameters=function(a){this._parts.duplicateQueryParameters=!!a;return this};e.escapeQuerySpace=function(a){this._parts.escapeQuerySpace=!!a;return this};return b});
(function(f,n){"object"===typeof exports?module.exports=n(require("./URI")):"function"===typeof define&&define.amd?define(["./URI"],n):f.URITemplate=n(f.URI,f)})(this,function(f,n){function g(b){if(g._cache[b])return g._cache[b];if(!(this instanceof g))return new g(b);this.expression=b;g._cache[b]=this;return this}function l(b){this.data=b;this.cache={}}var b=n&&n.URITemplate,k=Object.prototype.hasOwnProperty,A=g.prototype,w={"":{prefix:"",separator:",",named:!1,empty_name_separator:!1,encode:"encode"},
"+":{prefix:"",separator:",",named:!1,empty_name_separator:!1,encode:"encodeReserved"},"#":{prefix:"#",separator:",",named:!1,empty_name_separator:!1,encode:"encodeReserved"},".":{prefix:".",separator:".",named:!1,empty_name_separator:!1,encode:"encode"},"/":{prefix:"/",separator:"/",named:!1,empty_name_separator:!1,encode:"encode"},";":{prefix:";",separator:";",named:!0,empty_name_separator:!1,encode:"encode"},"?":{prefix:"?",separator:"&",named:!0,empty_name_separator:!0,encode:"encode"},"&":{prefix:"&",
separator:"&",named:!0,empty_name_separator:!0,encode:"encode"}};g._cache={};g.EXPRESSION_PATTERN=/\{([^a-zA-Z0-9%_]?)([^\}]+)(\}|$)/g;g.VARIABLE_PATTERN=/^([^*:]+)((\*)|:(\d+))?$/;g.VARIABLE_NAME_PATTERN=/[^a-zA-Z0-9%_]/;g.expand=function(b,f){var k=w[b.operator],l=k.named?"Named":"Unnamed",n=b.variables,t=[],r,p,e;for(e=0;p=n[e];e++)r=f.get(p.name),r.val.length?t.push(g["expand"+l](r,k,p.explode,p.explode&&k.separator||",",p.maxlength,p.name)):r.type&&t.push("");return t.length?k.prefix+t.join(k.separator):
""};g.expandNamed=function(b,g,k,l,n,t){var r="",p=g.encode;g=g.empty_name_separator;var e=!b[p].length,v=2===b.type?"":f[p](t),q,x,w;x=0;for(w=b.val.length;x<w;x++)n?(q=f[p](b.val[x][1].substring(0,n)),2===b.type&&(v=f[p](b.val[x][0].substring(0,n)))):e?(q=f[p](b.val[x][1]),2===b.type?(v=f[p](b.val[x][0]),b[p].push([v,q])):b[p].push([void 0,q])):(q=b[p][x][1],2===b.type&&(v=b[p][x][0])),r&&(r+=l),k?r+=v+(g||q?"=":"")+q:(x||(r+=f[p](t)+(g||q?"=":"")),2===b.type&&(r+=v+","),r+=q);return r};g.expandUnnamed=
function(b,g,k,l,n){var t="",r=g.encode;g=g.empty_name_separator;var p=!b[r].length,e,v,q,w;q=0;for(w=b.val.length;q<w;q++)n?v=f[r](b.val[q][1].substring(0,n)):p?(v=f[r](b.val[q][1]),b[r].push([2===b.type?f[r](b.val[q][0]):void 0,v])):v=b[r][q][1],t&&(t+=l),2===b.type&&(e=n?f[r](b.val[q][0].substring(0,n)):b[r][q][0],t+=e,t=k?t+(g||v?"=":""):t+","),t+=v;return t};g.noConflict=function(){n.URITemplate===g&&(n.URITemplate=b);return g};A.expand=function(b){var f="";this.parts&&this.parts.length||this.parse();
b instanceof l||(b=new l(b));for(var k=0,n=this.parts.length;k<n;k++)f+="string"===typeof this.parts[k]?this.parts[k]:g.expand(this.parts[k],b);return f};A.parse=function(){var b=this.expression,f=g.EXPRESSION_PATTERN,k=g.VARIABLE_PATTERN,n=g.VARIABLE_NAME_PATTERN,l=[],t=0,r,p,e;for(f.lastIndex=0;;){p=f.exec(b);if(null===p){l.push(b.substring(t));break}else l.push(b.substring(t,p.index)),t=p.index+p[0].length;if(!w[p[1]])throw Error('Unknown Operator "'+p[1]+'" in "'+p[0]+'"');if(!p[3])throw Error('Unclosed Expression "'+
p[0]+'"');r=p[2].split(",");for(var v=0,q=r.length;v<q;v++){e=r[v].match(k);if(null===e)throw Error('Invalid Variable "'+r[v]+'" in "'+p[0]+'"');if(e[1].match(n))throw Error('Invalid Variable Name "'+e[1]+'" in "'+p[0]+'"');r[v]={name:e[1],explode:!!e[3],maxlength:e[4]&&parseInt(e[4],10)}}if(!r.length)throw Error('Expression Missing Variable(s) "'+p[0]+'"');l.push({expression:p[0],operator:p[1],variables:r})}l.length||l.push(b);this.parts=l;return this};l.prototype.get=function(b){var f=this.data,
g={type:0,val:[],encode:[],encodeReserved:[]},l;if(void 0!==this.cache[b])return this.cache[b];this.cache[b]=g;f="[object Function]"===String(Object.prototype.toString.call(f))?f(b):"[object Function]"===String(Object.prototype.toString.call(f[b]))?f[b](b):f[b];if(void 0!==f&&null!==f)if("[object Array]"===String(Object.prototype.toString.call(f))){l=0;for(b=f.length;l<b;l++)void 0!==f[l]&&null!==f[l]&&g.val.push([void 0,String(f[l])]);g.val.length&&(g.type=3)}else if("[object Object]"===String(Object.prototype.toString.call(f))){for(l in f)k.call(f,
l)&&void 0!==f[l]&&null!==f[l]&&g.val.push([l,String(f[l])]);g.val.length&&(g.type=2)}else g.type=1,g.val.push([void 0,String(f)]);return g};f.expand=function(b,k){var l=(new g(b)).expand(k);return new f(l)};return g});

/**
 * @author       Rob W <gwnRob@gmail.com>
 * @website      http://stackoverflow.com/a/7513356/938089
 * @version      20131010
 * @description  Executes function on a framed YouTube video (see website link)
 *               For a full list of possible functions, see:
 *               https://developers.google.com/youtube/js_api_reference
 * @param String frame_id The id of (the div containing) the frame
 * @param String func     Desired function to call, eg. "playVideo"
 *        (Function)      Function to call when the player is ready.
 * @param Array  args     (optional) List of arguments to pass to function func*/
function callPlayer(frame_id, func, args) {
    if (window.jQuery && frame_id instanceof jQuery) frame_id = frame_id.get(0).id;
    var iframe = document.getElementById(frame_id);
    if (iframe && iframe.tagName.toUpperCase() != 'IFRAME') {
        iframe = iframe.getElementsByTagName('iframe')[0];
    }

    // When the player is not ready yet, add the event to a queue
    // Each frame_id is associated with an own queue.
    // Each queue has three possible states:
    //  undefined = uninitialised / array = queue / 0 = ready
    if (!callPlayer.queue) callPlayer.queue = {};
    var queue = callPlayer.queue[frame_id],
        domReady = document.readyState == 'complete';

    if (domReady && !iframe) {
        // DOM is ready and iframe does not exist. Log a message
        window.console && console.log('callPlayer: Frame not found; id=' + frame_id);
        if (queue) clearInterval(queue.poller);
    } else if (func === 'listening') {
        // Sending the "listener" message to the frame, to request status updates
        if (iframe && iframe.contentWindow) {
            func = '{"event":"listening","id":' + JSON.stringify(''+frame_id) + '}';
            iframe.contentWindow.postMessage(func, '*');
        }
    } else if (!domReady ||
               iframe && (!iframe.contentWindow || queue && !queue.ready) ||
               (!queue || !queue.ready) && typeof func === 'function') {
        if (!queue) queue = callPlayer.queue[frame_id] = [];
        queue.push([func, args]);
        if (!('poller' in queue)) {
            // keep polling until the document and frame is ready
            queue.poller = setInterval(function() {
                callPlayer(frame_id, 'listening');
            }, 250);
            // Add a global "message" event listener, to catch status updates:
            messageEvent(1, function runOnceReady(e) {
                if (!iframe) {
                    iframe = document.getElementById(frame_id);
                    if (!iframe) return;
                    if (iframe.tagName.toUpperCase() != 'IFRAME') {
                        iframe = iframe.getElementsByTagName('iframe')[0];
                        if (!iframe) return;
                    }
                }
                if (e.source === iframe.contentWindow) {
                    // Assume that the player is ready if we receive a
                    // message from the iframe
                    clearInterval(queue.poller);
                    queue.ready = true;
                    messageEvent(0, runOnceReady);
                    // .. and release the queue:
                    while (tmp = queue.shift()) {
                        callPlayer(frame_id, tmp[0], tmp[1]);
                    }
                }
            }, false);
        }
    } else if (iframe && iframe.contentWindow) {
        // When a function is supplied, just call it (like "onYouTubePlayerReady")
        if (func.call) return func();
        // Frame exists, send message
        iframe.contentWindow.postMessage(JSON.stringify({
            "event": "command",
            "func": func,
            "args": args || [],
            "id": frame_id
        }), "*");
    }
    /* IE8 does not support addEventListener... */
    function messageEvent(add, listener) {
        var w3 = add ? window.addEventListener : window.removeEventListener;
        w3 ?
            w3('message', listener, !1)
        :
            (add ? window.attachEvent : window.detachEvent)('onmessage', listener);
    }
}
/*!
 * hoverIntent r7 // 2013.03.11 // jQuery 1.9.1+
 * http://cherne.net/brian/resources/jquery.hoverIntent.html
 *
 * You may use hoverIntent under the terms of the MIT license.
 * Copyright 2007, 2013 Brian Cherne
 */

	  	//use this if you are using a nav with a mega menu.
		//Used in the same way as the jQuery .hover() function.

(function(e){e.fn.hoverIntent=function(t,n,r){var i={interval:100,sensitivity:7,timeout:0};if(typeof t==="object"){i=e.extend(i,t)}else if(e.isFunction(n)){i=e.extend(i,{over:t,out:n,selector:r})}else{i=e.extend(i,{over:t,out:t,selector:n})}var s,o,u,a;var f=function(e){s=e.pageX;o=e.pageY};var l=function(t,n){n.hoverIntent_t=clearTimeout(n.hoverIntent_t);if(Math.abs(u-s)+Math.abs(a-o)<i.sensitivity){e(n).off("mousemove.hoverIntent",f);n.hoverIntent_s=1;return i.over.apply(n,[t])}else{u=s;a=o;n.hoverIntent_t=setTimeout(function(){l(t,n)},i.interval)}};var c=function(e,t){t.hoverIntent_t=clearTimeout(t.hoverIntent_t);t.hoverIntent_s=0;return i.out.apply(t,[e])};var h=function(t){var n=jQuery.extend({},t);var r=this;if(r.hoverIntent_t){r.hoverIntent_t=clearTimeout(r.hoverIntent_t)}if(t.type=="mouseenter"){u=n.pageX;a=n.pageY;e(r).on("mousemove.hoverIntent",f);if(r.hoverIntent_s!=1){r.hoverIntent_t=setTimeout(function(){l(n,r)},i.interval)}}else{e(r).off("mousemove.hoverIntent",f);if(r.hoverIntent_s==1){r.hoverIntent_t=setTimeout(function(){c(n,r)},i.timeout)}}};return this.on({"mouseenter.hoverIntent":h,"mouseleave.hoverIntent":h},i.selector)}})(jQuery)
!function(t,i,e,s){"use strict";function o(i,e){this.element=i,this.$context=t(i).data("api",this),this.$layers=this.$context.find(".layer");var s={calibrateX:this.$context.data("calibrate-x")||null,calibrateY:this.$context.data("calibrate-y")||null,invertX:this.$context.data("invert-x")||null,invertY:this.$context.data("invert-y")||null,limitX:parseFloat(this.$context.data("limit-x"))||null,limitY:parseFloat(this.$context.data("limit-y"))||null,scalarX:parseFloat(this.$context.data("scalar-x"))||null,scalarY:parseFloat(this.$context.data("scalar-y"))||null,frictionX:parseFloat(this.$context.data("friction-x"))||null,frictionY:parseFloat(this.$context.data("friction-y"))||null,originX:parseFloat(this.$context.data("origin-x"))||null,originY:parseFloat(this.$context.data("origin-y"))||null};for(var o in s)null===s[o]&&delete s[o];t.extend(this,r,e,s),this.calibrationTimer=null,this.calibrationFlag=!0,this.enabled=!1,this.depths=[],this.raf=null,this.bounds=null,this.ex=0,this.ey=0,this.ew=0,this.eh=0,this.ecx=0,this.ecy=0,this.erx=0,this.ery=0,this.cx=0,this.cy=0,this.ix=0,this.iy=0,this.mx=0,this.my=0,this.vx=0,this.vy=0,this.onMouseMove=this.onMouseMove.bind(this),this.onDeviceOrientation=this.onDeviceOrientation.bind(this),this.onOrientationTimer=this.onOrientationTimer.bind(this),this.onCalibrationTimer=this.onCalibrationTimer.bind(this),this.onAnimationFrame=this.onAnimationFrame.bind(this),this.onWindowResize=this.onWindowResize.bind(this),this.initialise()}var n="parallax",a=30,r={relativeInput:!1,clipRelativeInput:!1,calibrationThreshold:100,calibrationDelay:500,supportDelay:500,calibrateX:!1,calibrateY:!0,invertX:!0,invertY:!0,limitX:!1,limitY:!1,scalarX:10,scalarY:10,frictionX:.1,frictionY:.1,originX:.5,originY:.5};o.prototype.transformSupport=function(t){for(var o=e.createElement("div"),n=!1,a=null,r=!1,h=null,l=null,p=0,c=this.vendors.length;c>p;p++)if(null!==this.vendors[p]?(h=this.vendors[p][0]+"transform",l=this.vendors[p][1]+"Transform"):(h="transform",l="transform"),o.style[l]!==s){n=!0;break}switch(t){case"2D":r=n;break;case"3D":if(n){var m=e.body||e.createElement("body"),u=e.documentElement,y=u.style.overflow;e.body||(u.style.overflow="hidden",u.appendChild(m),m.style.overflow="hidden",m.style.background=""),m.appendChild(o),o.style[l]="translate3d(1px,1px,1px)",a=i.getComputedStyle(o).getPropertyValue(h),r=a!==s&&a.length>0&&"none"!==a,u.style.overflow=y,m.removeChild(o)}}return r},o.prototype.ww=null,o.prototype.wh=null,o.prototype.wcx=null,o.prototype.wcy=null,o.prototype.wrx=null,o.prototype.wry=null,o.prototype.portrait=null,o.prototype.desktop=!navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i),o.prototype.vendors=[null,["-webkit-","webkit"],["-moz-","Moz"],["-o-","O"],["-ms-","ms"]],o.prototype.motionSupport=!!i.DeviceMotionEvent,o.prototype.orientationSupport=!!i.DeviceOrientationEvent,o.prototype.orientationStatus=0,o.prototype.transform2DSupport=o.prototype.transformSupport("2D"),o.prototype.transform3DSupport=o.prototype.transformSupport("3D"),o.prototype.propertyCache={},o.prototype.initialise=function(){"static"===this.$context.css("position")&&this.$context.css({position:"relative"}),this.accelerate(this.$context),this.updateLayers(),this.updateDimensions(),this.enable(),this.queueCalibration(this.calibrationDelay)},o.prototype.updateLayers=function(){this.$layers=this.$context.find(".layer"),this.depths=[],this.$layers.css({position:"absolute",display:"block",left:0,top:0}),this.$layers.first().css({position:"relative"}),this.accelerate(this.$layers),this.$layers.each(t.proxy(function(i,e){this.depths.push(t(e).data("depth")||0)},this))},o.prototype.updateDimensions=function(){this.ww=i.innerWidth,this.wh=i.innerHeight,this.wcx=this.ww*this.originX,this.wcy=this.wh*this.originY,this.wrx=Math.max(this.wcx,this.ww-this.wcx),this.wry=Math.max(this.wcy,this.wh-this.wcy)},o.prototype.updateBounds=function(){this.bounds=this.element.getBoundingClientRect(),this.ex=this.bounds.left,this.ey=this.bounds.top,this.ew=this.bounds.width,this.eh=this.bounds.height,this.ecx=this.ew*this.originX,this.ecy=this.eh*this.originY,this.erx=Math.max(this.ecx,this.ew-this.ecx),this.ery=Math.max(this.ecy,this.eh-this.ecy)},o.prototype.queueCalibration=function(t){clearTimeout(this.calibrationTimer),this.calibrationTimer=setTimeout(this.onCalibrationTimer,t)},o.prototype.enable=function(){this.enabled||(this.enabled=!0,this.orientationSupport?(this.portrait=null,i.addEventListener("deviceorientation",this.onDeviceOrientation),setTimeout(this.onOrientationTimer,this.supportDelay)):(this.cx=0,this.cy=0,this.portrait=!1,i.addEventListener("mousemove",this.onMouseMove)),i.addEventListener("resize",this.onWindowResize),this.raf=requestAnimationFrame(this.onAnimationFrame))},o.prototype.disable=function(){this.enabled&&(this.enabled=!1,this.orientationSupport?i.removeEventListener("deviceorientation",this.onDeviceOrientation):i.removeEventListener("mousemove",this.onMouseMove),i.removeEventListener("resize",this.onWindowResize),cancelAnimationFrame(this.raf))},o.prototype.calibrate=function(t,i){this.calibrateX=t===s?this.calibrateX:t,this.calibrateY=i===s?this.calibrateY:i},o.prototype.invert=function(t,i){this.invertX=t===s?this.invertX:t,this.invertY=i===s?this.invertY:i},o.prototype.friction=function(t,i){this.frictionX=t===s?this.frictionX:t,this.frictionY=i===s?this.frictionY:i},o.prototype.scalar=function(t,i){this.scalarX=t===s?this.scalarX:t,this.scalarY=i===s?this.scalarY:i},o.prototype.limit=function(t,i){this.limitX=t===s?this.limitX:t,this.limitY=i===s?this.limitY:i},o.prototype.origin=function(t,i){this.originX=t===s?this.originX:t,this.originY=i===s?this.originY:i},o.prototype.clamp=function(t,i,e){return t=Math.max(t,i),t=Math.min(t,e)},o.prototype.css=function(i,e,o){var n=this.propertyCache[e];if(!n)for(var a=0,r=this.vendors.length;r>a;a++)if(n=null!==this.vendors[a]?t.camelCase(this.vendors[a][1]+"-"+e):e,i.style[n]!==s){this.propertyCache[e]=n;break}i.style[n]=o},o.prototype.accelerate=function(t){for(var i=0,e=t.length;e>i;i++){var s=t[i];this.css(s,"transform","translate3d(0,0,0)"),this.css(s,"transform-style","preserve-3d"),this.css(s,"backface-visibility","hidden")}},o.prototype.setPosition=function(t,i,e){i+="px",e+="px",this.transform3DSupport?this.css(t,"transform","translate3d("+i+","+e+",0)"):this.transform2DSupport?this.css(t,"transform","translate("+i+","+e+")"):(t.style.left=i,t.style.top=e)},o.prototype.onOrientationTimer=function(){this.orientationSupport&&0===this.orientationStatus&&(this.disable(),this.orientationSupport=!1,this.enable())},o.prototype.onCalibrationTimer=function(){this.calibrationFlag=!0},o.prototype.onWindowResize=function(){this.updateDimensions()},o.prototype.onAnimationFrame=function(){this.updateBounds();var t=this.ix-this.cx,i=this.iy-this.cy;(Math.abs(t)>this.calibrationThreshold||Math.abs(i)>this.calibrationThreshold)&&this.queueCalibration(0),this.portrait?(this.mx=this.calibrateX?i:this.iy,this.my=this.calibrateY?t:this.ix):(this.mx=this.calibrateX?t:this.ix,this.my=this.calibrateY?i:this.iy),this.mx*=this.ew*(this.scalarX/100),this.my*=this.eh*(this.scalarY/100),isNaN(parseFloat(this.limitX))||(this.mx=this.clamp(this.mx,-this.limitX,this.limitX)),isNaN(parseFloat(this.limitY))||(this.my=this.clamp(this.my,-this.limitY,this.limitY)),this.vx+=(this.mx-this.vx)*this.frictionX,this.vy+=(this.my-this.vy)*this.frictionY;for(var e=0,s=this.$layers.length;s>e;e++){var o=this.depths[e],n=this.$layers[e],a=this.vx*o*(this.invertX?-1:1),r=this.vy*o*(this.invertY?-1:1);this.setPosition(n,a,r)}this.raf=requestAnimationFrame(this.onAnimationFrame)},o.prototype.onDeviceOrientation=function(t){if(!this.desktop&&null!==t.beta&&null!==t.gamma){this.orientationStatus=1;var e=(t.beta||0)/a,s=(t.gamma||0)/a,o=i.innerHeight>i.innerWidth;this.portrait!==o&&(this.portrait=o,this.calibrationFlag=!0),this.calibrationFlag&&(this.calibrationFlag=!1,this.cx=e,this.cy=s),this.ix=e,this.iy=s}},o.prototype.onMouseMove=function(t){var i=t.clientX,e=t.clientY;!this.orientationSupport&&this.relativeInput?(this.clipRelativeInput&&(i=Math.max(i,this.ex),i=Math.min(i,this.ex+this.ew),e=Math.max(e,this.ey),e=Math.min(e,this.ey+this.eh)),this.ix=(i-this.ex-this.ecx)/this.erx,this.iy=(e-this.ey-this.ecy)/this.ery):(this.ix=(i-this.wcx)/this.wrx,this.iy=(e-this.wcy)/this.wry)};var h={enable:o.prototype.enable,disable:o.prototype.disable,updateLayers:o.prototype.updateLayers,calibrate:o.prototype.calibrate,friction:o.prototype.friction,invert:o.prototype.invert,scalar:o.prototype.scalar,limit:o.prototype.limit,origin:o.prototype.origin};t.fn[n]=function(i){var e=arguments;return this.each(function(){var s=t(this),a=s.data(n);a||(a=new o(this,i),s.data(n,a)),h[i]&&a[i].apply(a,Array.prototype.slice.call(e,1))})}}(window.jQuery||window.Zepto,window,document),function(){for(var t=0,i=["ms","moz","webkit","o"],e=0;e<i.length&&!window.requestAnimationFrame;++e)window.requestAnimationFrame=window[i[e]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[i[e]+"CancelAnimationFrame"]||window[i[e]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(i){var e=(new Date).getTime(),s=Math.max(0,16-(e-t)),o=window.setTimeout(function(){i(e+s)},s);return t=e+s,o}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(t){clearTimeout(t)})}();
/*!
 *  Remodal - v1.0.3
 *  Responsive, lightweight, fast, synchronized with CSS animations, fully customizable modal window plugin with declarative configuration and hash tracking.
 *  http://vodkabears.github.io/remodal/
 *
 *  Made by Ilya Makarov
 *  Under MIT License
 */
!function(t,n){"function"==typeof define&&define.amd?define(["jquery"],function(e){return n(t,e)}):"object"==typeof exports?n(t,require("jquery")):n(t,t.jQuery||t.Zepto)}(this,function(t,n){"use strict";function e(t){if(E&&"none"===t.css("animation-name")&&"none"===t.css("-webkit-animation-name")&&"none"===t.css("-moz-animation-name")&&"none"===t.css("-o-animation-name")&&"none"===t.css("-ms-animation-name"))return 0;var n,e,a,i,o=t.css("animation-duration")||t.css("-webkit-animation-duration")||t.css("-moz-animation-duration")||t.css("-o-animation-duration")||t.css("-ms-animation-duration")||"0s",s=t.css("animation-delay")||t.css("-webkit-animation-delay")||t.css("-moz-animation-delay")||t.css("-o-animation-delay")||t.css("-ms-animation-delay")||"0s",r=t.css("animation-iteration-count")||t.css("-webkit-animation-iteration-count")||t.css("-moz-animation-iteration-count")||t.css("-o-animation-iteration-count")||t.css("-ms-animation-iteration-count")||"1";for(o=o.split(", "),s=s.split(", "),r=r.split(", "),i=0,e=o.length,n=Number.NEGATIVE_INFINITY;e>i;i++)a=parseFloat(o[i])*parseInt(r[i],10)+parseFloat(s[i]),a>n&&(n=a);return a}function a(){if(n(document.body).height()<=n(window).height())return 0;var t,e,a=document.createElement("div"),i=document.createElement("div");return a.style.visibility="hidden",a.style.width="100px",document.body.appendChild(a),t=a.offsetWidth,a.style.overflow="scroll",i.style.width="100%",a.appendChild(i),e=i.offsetWidth,a.parentNode.removeChild(a),t-e}function i(){var t,e,i=n("html"),o=l("is-locked");i.hasClass(o)||(e=n(document.body),t=parseInt(e.css("padding-right"),10)+a(),e.css("padding-right",t+"px"),i.addClass(o))}function o(){var t,e,i=n("html"),o=l("is-locked");i.hasClass(o)&&(e=n(document.body),t=parseInt(e.css("padding-right"),10)-a(),e.css("padding-right",t+"px"),i.removeClass(o))}function s(t,n,e,a){var i=l("is",n),o=[l("is",$.CLOSING),l("is",$.OPENING),l("is",$.CLOSED),l("is",$.OPENED)].join(" ");t.$bg.removeClass(o).addClass(i),t.$overlay.removeClass(o).addClass(i),t.$wrapper.removeClass(o).addClass(i),t.$modal.removeClass(o).addClass(i),t.state=n,!e&&t.$modal.trigger({type:n,reason:a},[{reason:a}])}function r(t,a,i){var o=0,s=function(t){t.target===this&&o++},r=function(t){t.target===this&&0===--o&&(n.each(["$bg","$overlay","$wrapper","$modal"],function(t,n){i[n].off(v+" "+C)}),a())};n.each(["$bg","$overlay","$wrapper","$modal"],function(t,n){i[n].on(v,s).on(C,r)}),t(),0===e(i.$bg)&&0===e(i.$overlay)&&0===e(i.$wrapper)&&0===e(i.$modal)&&(n.each(["$bg","$overlay","$wrapper","$modal"],function(t,n){i[n].off(v+" "+C)}),a())}function c(t){t.state!==$.CLOSED&&(n.each(["$bg","$overlay","$wrapper","$modal"],function(n,e){t[e].off(v+" "+C)}),t.$bg.removeClass(t.settings.modifier),t.$overlay.removeClass(t.settings.modifier).hide(),t.$wrapper.hide(),o(),s(t,$.CLOSED,!0))}function d(t){var n,e,a,i,o={};for(t=t.replace(/\s*:\s*/g,":").replace(/\s*,\s*/g,","),n=t.split(","),i=0,e=n.length;e>i;i++)n[i]=n[i].split(":"),a=n[i][1],("string"==typeof a||a instanceof String)&&(a="true"===a||("false"===a?!1:a)),("string"==typeof a||a instanceof String)&&(a=isNaN(a)?a:+a),o[n[i][0]]=a;return o}function l(){for(var t=h,n=0;n<arguments.length;++n)t+="-"+arguments[n];return t}function m(){var t,e,a=location.hash.replace("#","");if(a){try{e=n("[data-"+g+"-id="+a.replace(new RegExp("/","g"),"\\/")+"]")}catch(i){}e&&e.length&&(t=n[g].lookup[e.data(g)],t&&t.settings.hashTracking&&t.open())}else u&&u.state===$.OPENED&&u.settings.hashTracking&&u.close()}function p(t,e){var a=n(document.body),i=this;i.settings=n.extend({},O,e),i.index=n[g].lookup.push(i)-1,i.state=$.CLOSED,i.$overlay=n("."+l("overlay")),i.$overlay.length||(i.$overlay=n("<div>").addClass(l("overlay")+" "+l("is",$.CLOSED)).hide(),a.append(i.$overlay)),i.$bg=n("."+l("bg")).addClass(l("is",$.CLOSED)),i.$modal=t.addClass(h+" "+l("is-initialized")+" "+i.settings.modifier+" "+l("is",$.CLOSED)).attr("tabindex","-1"),i.$wrapper=n("<div>").addClass(l("wrapper")+" "+i.settings.modifier+" "+l("is",$.CLOSED)).hide().append(i.$modal),a.append(i.$wrapper),i.$wrapper.on("click."+h,"[data-"+g+'-action="close"]',function(t){t.preventDefault(),i.close()}),i.$wrapper.on("click."+h,"[data-"+g+'-action="cancel"]',function(t){t.preventDefault(),i.$modal.trigger(y.CANCELLATION),i.settings.closeOnCancel&&i.close(y.CANCELLATION)}),i.$wrapper.on("click."+h,"[data-"+g+'-action="confirm"]',function(t){t.preventDefault(),i.$modal.trigger(y.CONFIRMATION),i.settings.closeOnConfirm&&i.close(y.CONFIRMATION)}),i.$wrapper.on("click."+h,function(t){var e=n(t.target);e.hasClass(l("wrapper"))&&i.settings.closeOnOutsideClick&&i.close()})}var u,f,g="remodal",h=t.REMODAL_GLOBALS&&t.REMODAL_GLOBALS.NAMESPACE||g,v=n.map(["animationstart","webkitAnimationStart","MSAnimationStart","oAnimationStart"],function(t){return t+"."+h}).join(" "),C=n.map(["animationend","webkitAnimationEnd","MSAnimationEnd","oAnimationEnd"],function(t){return t+"."+h}).join(" "),O=n.extend({hashTracking:!0,closeOnConfirm:!0,closeOnCancel:!0,closeOnEscape:!0,closeOnOutsideClick:!0,modifier:""},t.REMODAL_GLOBALS&&t.REMODAL_GLOBALS.DEFAULTS),$={CLOSING:"closing",CLOSED:"closed",OPENING:"opening",OPENED:"opened"},y={CONFIRMATION:"confirmation",CANCELLATION:"cancellation"},E=function(){var t=document.createElement("div").style;return void 0!==t.animationName||void 0!==t.WebkitAnimationName||void 0!==t.MozAnimationName||void 0!==t.msAnimationName||void 0!==t.OAnimationName}();p.prototype.open=function(){var t,e=this;e.state!==$.OPENING&&e.state!==$.CLOSING&&(t=e.$modal.attr("data-"+g+"-id"),t&&e.settings.hashTracking&&(f=n(window).scrollTop(),location.hash=t),u&&u!==e&&c(u),u=e,i(),e.$bg.addClass(e.settings.modifier),e.$overlay.addClass(e.settings.modifier).show(),e.$wrapper.show().scrollTop(0),e.$modal.focus(),r(function(){s(e,$.OPENING)},function(){s(e,$.OPENED)},e))},p.prototype.close=function(t){var e=this;e.state!==$.OPENING&&e.state!==$.CLOSING&&(e.settings.hashTracking&&e.$modal.attr("data-"+g+"-id")===location.hash.substr(1)&&(location.hash="",n(window).scrollTop(f)),r(function(){s(e,$.CLOSING,!1,t)},function(){e.$bg.removeClass(e.settings.modifier),e.$overlay.removeClass(e.settings.modifier).hide(),e.$wrapper.hide(),o(),s(e,$.CLOSED,!1,t)},e))},p.prototype.getState=function(){return this.state},p.prototype.destroy=function(){var t,e=n[g].lookup;c(this),this.$wrapper.remove(),delete e[this.index],t=n.grep(e,function(t){return!!t}).length,0===t&&(this.$overlay.remove(),this.$bg.removeClass(l("is",$.CLOSING)+" "+l("is",$.OPENING)+" "+l("is",$.CLOSED)+" "+l("is",$.OPENED)))},n[g]={lookup:[]},n.fn[g]=function(t){var e,a;return this.each(function(i,o){a=n(o),null==a.data(g)?(e=new p(a,t),a.data(g,e.index),e.settings.hashTracking&&a.attr("data-"+g+"-id")===location.hash.substr(1)&&e.open()):e=n[g].lookup[a.data(g)]}),e},n(document).ready(function(){n(document).on("click","[data-"+g+"-target]",function(t){t.preventDefault();var e=t.currentTarget,a=e.getAttribute("data-"+g+"-target"),i=n("[data-"+g+"-id="+a+"]");n[g].lookup[i.data(g)].open()}),n(document).find("."+h).each(function(t,e){var a=n(e),i=a.data(g+"-options");i?("string"==typeof i||i instanceof String)&&(i=d(i)):i={},a[g](i)}),n(document).on("keydown."+h,function(t){u&&u.settings.closeOnEscape&&u.state===$.OPENED&&27===t.keyCode&&u.close()}),n(window).on("hashchange."+h,m)})});
/*************************************************\
  SCREEN SIZE
================================================
  Always know the current screen width & height

  //VG for Variable Global
\************************************************/

function getPageHeight(){
	return $('[data-jshook*="siteContainer"]').outerHeight();
}

var G_screen_width = $(window).width();
var G_screen_height = $(window).height();
var G_page_height = getPageHeight();
var G_header_height = $('.progressBar').height() + $('.headerTools__title').height();

//determines how far down the screen animations start (0.66 = 66% down the screen)
var G_buffer_higher = parseInt(G_screen_height * 0.25);
var G_buffer_high = parseInt(G_screen_height * 0.33);
var G_buffer_low = parseInt(G_screen_height * 0.66);
var G_buffer_lower = parseInt(G_screen_height * 0.75);

//Holds functions that fire on resize/scroll
//use G_onResize.push(function(){...}); anywhere to fire functions after user has resized screen
//use G_onScrollStop.push(function(){...}); anywhere to fire functions at end of scroll
var G_onResize = [];
var G_onScrollStop = [];

$(window).resize(function(){
	G_screen_width = $(window).width();
	G_screen_height = $(window).height();
	G_page_height = $('[data-jshook*="siteContainer"]').outerHeight();

	G_buffer_higher = parseInt(G_screen_height * 0.25);
	G_buffer_high = parseInt(G_screen_height * 0.33);
	G_buffer_low = parseInt(G_screen_height * 0.66);
	G_buffer_lower = parseInt(G_screen_height * 0.75);

	clearTimeout(window.resizedFinished);
    window.resizedFinished = setTimeout(function(i, resizeFunction){
    	$.each(G_onResize, function(){
    		//calls functions that fire after user resizes the screen
			if (typeof resizeFunction !== 'undefined') {
	    		resizeFunction.call();
			}
    	});
    }, 250);

});

var G_scrollPos = $(document).scrollTop();

var willChangeElement = $('.TK-willChange');
var willChangeClass = 'TK-willChange--isApplied-JS';

$(window).scroll(function(e){
    G_scrollPos = $(document).scrollTop();

	if (G_scrollPos < (G_screen_height + 300)) {
		willChangeElement.not('.'+willChangeClass).addClass(willChangeClass);
	} else {
		willChangeElement.filter('.'+willChangeClass).removeClass(willChangeClass);
	}

	clearTimeout(window.scrolling);
    window.scrolling = setTimeout(function(){
    	$.each(G_onScrollStop, function(i, scrollStopFunction){
    		//calls functions that fire after user has finished scrolling
			if (typeof scrollStopFunction !== 'undefined') {
	    		scrollStopFunction.call();
			}
    	});
    }, 250);
	//console.log(scrollPos);

});

G_onScrollStop.push(function(){
	willChangeElement.filter('.'+willChangeClass).removeClass(willChangeClass);
});

///*================================================*\
//	BREAK POINTS
//----------------------------------------------------
//	Defines the points at which the page design
//	will snap and drastically change it's styles
//
//	!!!WARNING!!!
//	Ensure that these are always in synch with
//	the SASS break points:
//	/assets/sass/00-config-files/break-points.scss
//*================================================*/

var bp = {
	'tiny': 350, //*essentially iphones in portrait view only*/
	'small': 480,
	'mobile': 600, ///*!MAJOR BREAK POINT!*//*Maximum for strict mobile view*/
	'mid': 770, //*essentially the maximum for iPads in portrait*/
	'tablet': 960, ///*!MAJOR BREAK POINT!*/ /*good place to switch to tablet view*/
	'large': 1024, //*maximum for iPads in landscape*/
	'page': 1200, ///*!MAJOR BREAK POINT!*//*Point at which the edge of the desktop design meets the edge of the screen*/
};

var G_countUpOptions = {
	useEasing : true,
	useGrouping : true,
	separator : ',',
	decimal : '.',
	prefix : '',
	suffix : ''
};


//lists the available Global targets that relate to the variables here
var globals = {
	//global hooks
	fullScreen_filler : 'fullScreen__filler',
	fullScreen_subtractor : 'fullScreen__subtractor',

	//global CSS classes
	fullScreen_isApplied : 'fullScreen__filler--isApplied-JS',
};


var MQG_home_is_scrollAnimated = G_screen_width > bp['page'];


var G_siteTitle = $('title').text().split('| ').pop();

var G_pageTitle = $('title').text().split(' |')[0];

function defaultTo(variable, default_value){
	//if it's an object, treat each setting in the object seperately
	if (typeof default_value === 'object' ){
		var paramObject = variable;
		var defaultParams = default_value
	    var finalParams = defaultParams;

		//http://adripofjavascript.com/blog/drips/default-parameters-in-javascript.html

	    // We iterate over each property of the paramObject
	    for (var key in paramObject) {
	        // If the current property wasn't inherited, proceed
	        if (paramObject.hasOwnProperty(key)) {
	            // If the current property is defined,
	            // add it to finalParams
	            if (paramObject[key] !== 'undefined') {
	                finalParams[key] = paramObject[key];
	            }
	        }
	    }

	    return finalParams;

	} else {
		//in all other cases completely relace the default value of the variable if a value is given 
		return typeof variable === 'undefined' ?  default_value : variable;
	}
}

/*********************\
  TARGETING FUNCTIONS
\*********************/

//h = hook ([data-jshook="xxx"])
//c = class (".xxx")
//s = span ("xxx")
//id = id ("#xxx")


//sets up the default module targets variable that gets overwritten in every module
var module = '';
var moduleTargets = {};

function applyClassSet(classSet){
	if (typeof classSet == 'string'){
		return moduleTargets[classSet];
	} else {
		return defaultTo(classSet, moduleTargets[module]);
	}
}

//returns a CLASS (dot added) eg. ".module-element--modifier-JS"
var Class = function (key,classSet){
	classSet = applyClassSet(classSet);

	var selectorFull = '';

	if ( key.constructor === Array){
		$.each(key, function(i, string){
			var comma = (i == 0) ? '' : ', ';
			selectorFull = selectorFull + comma + '.'+classSet[string];
		});
	} else {
		selectorFull = '.'+classSet[key];
	};

	return selectorFull;
}

//returns a SPAN (nothing added) eg. "module-element--modifier-JS"
//does not accept arrays
var Span = function (key,classSet){
	classSet = applyClassSet(classSet);
	return classSet[key];
};

//returns a HOOK (an attribute selector)
var Hook = function(key,classSet){

	classSet = applyClassSet(classSet);

	var selectorFull = '';
	var selectorFullArray = [];

	var hookPart = function(number, key){
		switch(number){
			case 0: var partial = '[data-jshook^="'+classSet[key]+' "]'; break;
			case 1: var partial = '[data-jshook*=" '+classSet[key]+' "]'; break;
			case 2: var partial = '[data-jshook$=" '+classSet[key]+'"]'; break;
			case 3: var partial = '[data-jshook="'+classSet[key]+'"]'; break;

			//simplified but less strict
			case 4: var partial = '[data-jshook*="'+classSet[key]+'"]'; break;
		}

		return partial;
	}

	var singleHook = function (key) {
		return hookPart(0,key)+','+hookPart(1,key)+','+hookPart(2,key)+','+hookPart(3,key);
	}

//if an array, merge into a single selector as an "or" statement
	if ( key.constructor === Array){
		$.each(key, function(i, string){
			var selectorPartial = '';
			//if inside a second array, merge them into an "and" statement
			if( string.constructor === Array) {
				$.each(string, function(x, finalString){
					selectorPartial = selectorPartial + hookPart(4,finalString);
				})
				selectorFullArray[i] = selectorPartial;
			} else {
				//or statement
				var comma = (i == 0) ? '' : ', ';
				selectorFull = selectorFull + comma + singleHook(string);
			}
		});
		$.each(selectorFullArray, function(index, string){
			var comma = (index == 0) ? '' : ', ';
			selectorFull = selectorFull + comma + string;
		})
//else just output a single copy of the selector
	} else {
		selectorFull = singleHook(key);
	};


	return selectorFull;
}

//returns an ID (hash added) eg. "#js-module-element"
var id = function (key,classSet){
	classSet = applyClassSet(classSet);

	var selectorFull = '';

	if ( key.constructor === Array){
		$.each(key, function(i, string){
			var comma = (i == 0) ? '' : ', ';
			selectorFull = selectorFull + comma + '#'+classSet[string];
		});
	} else {
		selectorFull = '#'+classSet[key];
	};

	return selectorFull;
};




//module class manipulation

function grabClasses (target, classSet){
	var allClasses = '';
//if an array, add all classes in one hit
	if ( target.constructor === Array){
		$.each(target, function(i, thisClass){
			var space = (i == 0) ? '' : ' ';
			allClasses = allClasses + space + Span(thisClass, classSet);
		});
//else just output the single class
	} else {
		allClasses = Span(target, classSet);
	};

	return allClasses;
}

jQuery.fn.modAddClass = function(target, classSet) {
	classSet = applyClassSet(classSet);
	this.addClass(grabClasses(target, classSet));
    return this;
};

jQuery.fn.modRemoveClass = function(target, classSet) {
	classSet = applyClassSet(classSet);
    this.removeClass(grabClasses(target, classSet));
    return this;
};

jQuery.fn.modToggleClass = function(target, classSet) {
	classSet = applyClassSet(classSet);
    this.toggleClass(grabClasses(target, classSet));
    return this;
};

jQuery.fn.modHasClass = function(target, type, classSet) {
	classSet = applyClassSet(classSet);

	type = defaultTo(type, 'and');

//if an array, check for all classes in one hit
	if ( target.constructor === Array){
		var allClasses = '';
		$.each(target, function(i, testClass){
			var seperator = '';
			if (type == 'or' && i != 0) {
				seperator = ', ';
			} else if (type == 'and' && i != 0) {
				seperator = (i == 0) ? '' : ' ';
			}
			allClasses = allClasses + seperator + Class(testClass, classSet);
		});
	    return this.is(allClasses);
//else just check for the single class
	} else {
		classSet = defaultTo(classSet, type);//this means you don't need to waste time defining a useless type variable

	    return this.hasClass(Span(target, classSet));
	};

};

jQuery.fn.modHasHook = function(target, classSet) {
	classSet = applyClassSet(classSet);
	var hookString = this.attr('data-jshook');
    return hookString.indexOf(Span(target, classSet)) > 0;
};

//http://stackoverflow.com/a/9039885/1611058

function is_iOS() {

  var iDevices = [
    'iPad Simulator',
    'iPhone Simulator',
    'iPod Simulator',
    'iPad',
    'iPhone',
    'iPod'
  ];

  while (iDevices.length) {
    if (navigator.platform === iDevices.pop()){ return true; }
  }

  return false;
}
//http://stackoverflow.com/questions/10599933/convert-long-number-into-abbreviated-string-in-javascript-with-a-special-shortn
function abbreviateNumber(value) {
	value = Math.round(value);
    var newValue = value;
    if (value >= 1000) {
        var suffixes = ["", "k", "m", "b","t"];
        var suffixNum = Math.floor( (""+value).length/3 );
        var shortValue = '';
        for (var precision = 2; precision >= 1; precision--) {
            shortValue = parseFloat( (suffixNum != 0 ? (value / Math.pow(1000,suffixNum) ) : value).toPrecision(precision));
            var dotLessShortValue = (shortValue + '').replace(/[^a-zA-Z 0-9]+/g,'');
            if (dotLessShortValue.length <= 2) { break; }
        }
        if (shortValue % 1 != 0)  shortNum = shortValue.toFixed(1);
        newValue = shortValue+suffixes[suffixNum];
    }
    return newValue;
}
/****************************************\
   Allow time for css animations
   but only in browsers that support
   CSS3 animation
\****************************************/

function animationTime(time){
	if ($('html.csstransitions').length){
		return time;
	} else {
		return 0;
	};
}
//example usage:
/*
	setTimeout(function(){
		//script to carry out after css animation
	}, animation_time(500));
*/

//http://stackoverflow.com/questions/2901102/how-to-print-a-number-with-commas-as-thousands-separators-in-javascript

function commafy( num){
    var parts = (''+ (num<0?-num:num)).split("."), s=parts[0], i=L= s.length, o='',c;
  while(i--){ o = (i==0?'':((L-i)%3?'':','))
                  +s.charAt(i) +o }
    return (num<0?'-':'') + o + (parts[1] ? '.' + parts[1] : '');
}

//simple test to see if you are on the last loop of a .each() function
function isLastRound(index, testItem){
	return index == testItem.length - 1;
}

//designed to be used in an if statement like:
//if (min(bp['tablet']){ ...functionality... }

function min(size) {
	if (bp.hasOwnProperty(size)){
		return G_screen_width > (bp[size] + 1);
	} else {
		return G_screen_width > (size + 1);
	}
}

function max(size){
	if (bp.hasOwnProperty(size)){
		return G_screen_width < bp[size];
	} else {
		return G_screen_width < size;
	}
}

function inside(wideSize, thinSize){

	if (bp.hasOwnProperty(thinSize) && bp.hasOwnProperty(wideSize)){
		return  (bp[thinSize] + 1) < G_screen_width && G_screen_width < bp[wideSize];

	} else if (!bp.hasOwnProperty(thinSize) && bp.hasOwnProperty(wideSize)) {
		return  (thinSize + 1) < G_screen_width && G_screen_width < bp[wideSize];

	} else if (bp.hasOwnProperty(thinSize) && !bp.hasOwnProperty(wideSize)) {
		return  (bp[thinSize] + 1) < G_screen_width && G_screen_width < wideSize;

	} else if (!bp.hasOwnProperty(thinSize) && !bp.hasOwnProperty(wideSize)) {
		return  (thinSize + 1) < G_screen_width && G_screen_width < wideSize;
	}
}

function outside(wideSize, thinSize){
	return !inside(wideSize, thinSize);
}
//https://gist.github.com/sjwilliams/3929462

// Based on pieces from this thread:
// http://stackoverflow.com/questions/1881716/merging-jquery-objects
// use: var currentRowEls = []; // array of various jQ ojbects
//      mergeSelectors(currentRowEls).css({width:'200px'});

function mergeSelectors(objs) {
    var ret = objs.shift();
    while (objs.length) {
        ret = ret.add(objs.shift());
    }
    return ret;
};

/******************************************\
   Easily move elements to new locations
\******************************************/

	//target is the location it is being moved to
	//action is the position in relation to the target that the element takes

	//append = add it to the end of the target,
	//prepend = add to the beginning of the target,
	//before = place it just before the target,
	//after = place is straight after the target

	$.fn.moveTo = function(target,action) {

		//if target is a span it will wrap it in the jQuery selector
		target = typeof target == 'string' ? $(target) : target;

		if (typeof target != 'undefined') {
			switch(action){
				case "prepend": target.prepend(this); break;
				case "before": target.before(this); break;
				case "after": target.after(this); break;
				default : target.append(this); break;//assumes you want to append by default
			}
		}

		return this;
	}

/****************************************\
   IE safe version of preventDefault
\****************************************/
function preventDefault(e){
	(e.preventDefault) ? e.preventDefault() : e.returnValue = false;
}


function randomNumber(lower_bound, upper_bound, amount) {

	amount = defaultTo(amount, 1);
	lower_bound = defaultTo(lower_bound, 0);
	upper_bound = defaultTo(upper_bound, 999999999);

	var unique_random_numbers = [];

	//Example, including customisable intervals [lower_bound, upper_bound)
	while (unique_random_numbers.length < amount) {
	    var random_number = Math.round(Math.random()*(upper_bound - lower_bound) + lower_bound);
	    if (unique_random_numbers.indexOf(random_number) == -1) {
	        // Yay! new random number
	        unique_random_numbers.push( random_number );
	    }
	}

	if (amount == 1) {
		return unique_random_numbers[0];
	} else {
		return unique_random_numbers;
	}
	// unique_random_numbers is an array containing 3 unique numbers in the given range
}

//scroll to a specific pixel value point on the screen
function scrollTo(targetScrollPos, settings) {
	settings = defaultTo(settings, {
		duration : 0.5,
		callback : function(){},
		offset : 75,
		target : $('html, body'),
		ease : 'swing'//ease in and out
	});

	var finalScrollPos = targetScrollPos == 'max' ?
			G_page_height - G_screen_height :
			targetScrollPos;

	$('html, body').animate(
		{scrollTop: finalScrollPos - settings.offset},
		settings.duration * 1000,
		settings.ease,
		function(){
			settings.callback.call(settings.target)
		}
	);
}

//calls functions at specific stages
$.fn.stage = function(stage, callback) {
	self = this;
	var currentStage = self.attr( 'data-current-stage');
	if ( currentStage == stage ){
		callback.call(self);
	};
	return self;
};

//for adding timers to the addStages plugin
$.fn.addTimer = function(settings) {
	settings = defaultTo(settings, { repeatedElement: false });

	var _this = this;
	setTimeout(function(){
		_this
			.addClass('stage-' + (settings.classNumber)+'-JS')
			.attr('data-current-stage',settings.classNumber);

		//remove the old current stage class then add the new one
		_this[0].className = _this[0].className.replace(/\bcurrentStage.[0-9]*-JS\b/g, '');
		_this.addClass('currentStage-' + (settings.classNumber)+'-JS');

		if (settings.repeatedElement != false){
			$(settings.repeatedElement).eq(settings.classNumber - 1).addClass(settings.activationName);
		};
		if (settings.callback != false){
			settings.callback.call(_this, settings.classNumber);
		}
	},(settings.time * 1000))
};


//adds stage-1, stage-2, stage-3 etc. classes for every time parsed through the "stages" array
$.fn.addStages = function(settings, repeatedElement, activationName) {
	settings = defaultTo(settings, {
		startAt: 1,
		stages: [],
		callback: false,
		repeatedElement: false,
	});

	if (this.length && !this.hasClass('stage-1-JS')) {
		var total = this.length;
		var _this = this;

		//adds a "0" at the front for stage-1
		settings.stages.unshift(0);

		_this.each(function(){
				$.each(settings.stages,function(i){
					_this.addTimer({
						time: settings.stages[i],
						classNumber: settings.startAt + i,
						callback: settings.callback,
						repeatedElement: repeatedElement,
						activationName: activationName
					});
				})
		 });
	}
	return this;
};

//////////////////////////////////////
// 			Rapid stages           //
////////////////////////////////////

//If you have a series animations being fired off rapidly that have evenly spaced delays, use this...

$.fn.rapidStages = function(settings){

	settings = defaultTo(settings, {
		startAt: 1, //determine which stage to start countin from
		repeatedElement: '> *',//the element that fires the rapid stages
		activationName: 'stage__element--isActivated-JS',
		startStages: [],//timed stages before the rapid stages are added
		startTime: 0,//the time when the rapid stages start
		delay: 0.2,// the delay in seconds between each rapid stage
		endStages: [],//the timed stages that come after the rapid stages
		callback: false// the call back function that gets fired after each stage is added
	});

	var _this = this;
	var repeatedElement = _this.find(settings.repeatedElement);

	var allStages = settings.startStages;
	repeatedElement.each(function(i){

		allStages.push(settings.startTime + (settings.delay * i));

		if (isLastRound(i,repeatedElement)) {
			//merge the final stages into the complete list
			$.merge(allStages,settings.endStages);

			//add the stages when activated
			_this.addStages({
				startAt: settings.startAt,
				stages: allStages,
				callback: settings.callback
			}, repeatedElement, settings.activationName);
		}
	});

	return this;
};

//Removes all class names that were applied using the add stages plugin
$.fn.removeStages = function(activationClassName){
	activationClass = defaultTo(activationClassName, 'stage__element--isActivated-JS');

	this[0].className = this[0].className.replace(/\bcurrentStage.[0-9]*-JS\b/g, '').replace(/\bstage.[0-9]*-JS\b/g, '');

	this.find('.'+activationClass).removeClass(activationClass);

	return this;
}


//youtube iframe z-index fix (better to be done in backend code)

//ensures embeded youtube videos obay their z-index
$("iframe").length&&$("iframe").each(function(){var a=$(this).attr("src");b=-1===a.indexOf("?")?"?":"&";$(this).attr("src",a+b+"wmode=transparent")});//better to do this as back-end code


//Fire a function when the user clicks outside an element

//usage:
/*
	$('#element').outsideClick(function(){
		//code you want to run when clicked outside
	});
*/

//inspired by
//http://stackoverflow.com/a/3028037/1611058

(function($) {
	//when the user hits the escape key, it will trigger all outsideClick functions
	$(document).on("keyup", function (e) {
		if (e.which == 27) $('body').click(); //escape key
	});

	//The actual plugin
    $.fn.outsideClick = function(callback, exclusions) {
    	var subject = this;

		//test if exclusions have been set
		var hasExclusions = typeof exclusions !== 'undefined';

		var ClickOrTouchEvent = "ontouchend" in document ? "touchend" : "click";

		$('body').on(ClickOrTouchEvent, function(event) {
			//click target does not contain subject as a parent
			var clickedOutside = !$(event.target).closest(subject).length;

			//click target was on one of the excluded elements
			var clickedExclusion = $(event.target).closest(exclusions).length;

			var testSuccessful;

			if (hasExclusions) {
				testSuccessful = clickedOutside && !clickedExclusion;
			} else {
				testSuccessful = clickedOutside;
			}

		    if(testSuccessful) {
				callback.call(subject, event);
		    }
		});

        return this;
    };

}(jQuery));



//Scroll To Me plugin

//source: https://gist.github.com/irae/351062

//usage: jQuery('#myId').scrollToMe();

//allows you to easily scroll to particular elements on the page

jQuery.fn.scrollToMe = function(settings) {
	var _this = this;
	settings = defaultTo(settings, {target: _this});
	//setTimeout(function() {
		if (_this.length){
			var targetScrollPos = _this.offset().top;
			//html for IE body for everything else
			scrollTo(targetScrollPos, settings)
		}
	//},500);
	return this;
};

jQuery.fn.scrollToTarget = function(settings) {
	this.click(function(){
		$($(this).attr('href')).scrollToMe(settings);
	});
	return this;
}

$('a[href^="#"]').not('[data-jshook]').scrollToTarget();

var hash = window.location.hash;
if (hash.length){
	if (hash.indexOf('lightbox__') < 1){
		$(window.location.hash).scrollToMe();
	}
}

//stops scroll animation if user uses scroll wheel
$(window).on('mousewheel', function(){
	$('html, body').stop();
	G_autoScroll__isPlaying = false;
});


$.fn.swapTooltip = function(){
	this.toggleClass('tooltipSwap--swapped-JS');
	return this;
}

//Wait until an element has loaded before firing off a function.
//Particularly useful for ajax loaded content ;)
$.fn.waitForMe = function(callback, loopTime, timeout){

	timeout = defaultTo(timeout, 10000);//10 seconds
	loopTime = defaultTo(loopTime, 10);//delay between checks

	var selection = this.selector;
	var currentTime = 0;

	var interval = setInterval(function(){

		//element found successfully
		if ($(selection).length){
			clearInterval(interval);
			callback.call($(selection));

		//element not found within timeout time
		} else if (currentTime >= timeout){
			clearInterval(interval);
			throw "Error: " + selection + " was not found or failed to load.";
		}

		currentTime = currentTime + loopTime;
	}, loopTime);

	return this;
}

//wait until a variable has been defined
function waitForMe(variable, callback, loopTime, timeout){
	timeout = defaultTo(timeout, 10000);//10 seconds
	loopTime = defaultTo(loopTime, 10);//delay between checks

	var currentTime = 0;

	var interval = setInterval(function(){

		//element found successfully
		if (typeof variable !== 'undefined'){
			clearInterval(interval);
			callback.call($(selection));

		//element not found within timeout time
		} else if (currentTime >= timeout){
			clearInterval(interval);
			throw "Error: waitForMe variable was never defined.";
		}

		currentTime = currentTime + loopTime;
	}, loopTime);
}

//document.ready opening (it will be correct in the merged js file)
jQuery(function($){

moduleTargets = moduleTargets || {};

//This is to hide the home screen until all the heights have been calculated

var module_screenFader = 'screenFader';

module = module_screenFader;

moduleTargets[module] = {
    //js hooks
    module : module,
};

var screenFade = function(direction, time) {
	module = module_screenFader;
	time = defaultTo(time, 1000)

	var fn = {
		'in' : function(time){
			$(Hook('module')).fadeIn(time);
		},
		'out' : function(time){
			$(Hook('module')).fadeOut(time)
		}
	}
	fn[direction](time);
};

if ($(Hook('module')).length){
	if ($(Hook('fullScreen_filler', globals)).length) {
		$(Class('fullScreen_isApplied', globals)).waitForMe(function(){
			screenFade('out');
		});
	} else {
		screenFade('out');
	}
}


var module_accordion = 'accordion';

//required for the targeting funcitions
module = module_accordion;

moduleTargets[module] = {

	//JS hooks
	item : module+'__item',
	trigger_manual : module+'__trigger--manual',
	trigger_auto: module+'__trigger--auto',
	reference : module+'__reference',
	content : module+'__content',
	heading : module+'__heading',

	//css classes
	item_isOpen : module+'__item--isOpen-JS',
};

if ($(Hook('content')).length) {

	$(Hook('trigger_manual')).on('click',function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var target = $(this).attr('href');
		var this_item = $(this).closest(Hook('item'));

		$(target).children(Hook('content')).slideToggle();
		this_item.modToggleClass('item_isOpen');
	});

	$(Hook('trigger_auto')).click(function(e){
		module = module_accordion;

		preventDefault(e);//ie safe prevent default

		var target = $(this).attr('href');
		var targetContent = $(target).find(Hook('content'));
		var this_item = $($(this).attr('href'));

		var reference = $(this).closest(Hook('reference'));

		if (targetContent.is(':visible')){
			targetContent.slideUp();
			this_item.modRemoveClass('item_isOpen');

		} else {
			reference
				.find(Hook('item'))
					.not($(this))
					.modRemoveClass('item_isOpen')
					.end()
				.find(Hook('content')+':visible')
					.not(target)
					.slideUp()
					.end();

			reference
				.find(Hook('heading'))
				.slideDown();

			this_item
				.modAddClass('item_isOpen')
				.find(Hook('content'))
					.slideDown()
					.end()
				.find(Hook('heading'))
					.slideUp();
		}


		//this_item.modToggleClass('item_isOpen');
	});
}



//make any element take up the full screen height minus the optional subtracted element

$.fn.fillScreen = function(subtractorSelection){

	var _this = this;

	_this.each(function(i){
		$(this).modRemoveClass('fullScreen_isApplied', globals);

		var _subtractor = $(subtractorSelection);
		var extraSubtraction = $(this).attr('data-fullscreen-subtract') || 0;
		var subtractor__height = _subtractor.length ? _subtractor.height() : 0;

		$(this).css('min-height', G_screen_height - subtractor__height - extraSubtraction).modAddClass('fullScreen_isApplied', globals);

	})

};

var filler = $(Hook('fullScreen_filler', globals));
var subtractor = $(Hook('fullScreen_subtractor', globals))

filler.fillScreen(subtractor);

G_onResize.push(function(){
	filler.fillScreen(subtractor);
});


//This would be completely redundant code if iOS behaved properly
//When unfocusing from infoTip, CSS would close it but iOS isn't appying or stripping focus properly with pur CSS

var module_infoTip = 'infoTip';

module = module_infoTip;

moduleTargets[module] = {
    //js hooks
    trigger : module+'__trigger',
	close : module+'__close',

	//css classes
	isClosed : module+'--isClosed-JS',
	isOpen : module+'--isOpen-JS',
};

$(Hook('trigger')).click(function(e){
	module = module_infoTip;
	$(this).modAddClass('isOpen').modRemoveClass('isClosed');
	e.stopPropagation();
})
.outsideClick(function(){
	module = module_infoTip;
	if ($(this).modHasClass('isOpen')){
		$(this).modAddClass('isClosed').modRemoveClass('isOpen');
	}
});

$(Hook('close')).click(function(e){
	module = module_infoTip;
	$(this).closest(Hook('trigger')).modAddClass('isClosed').modRemoveClass('isOpen');
	e.stopPropagation();
});

var savedScrollPos = G_scrollPos;

$(document)
.on('opening', '[data-remodal-id]', function(){
	savedScrollPos = G_scrollPos;
})
.on('closing', '[data-remodal-id]', function (e) {
	screenFade('in',250);
	$('body').css({
		position: 'relative',
		top: -G_scrollPos,
	});
	scrollTo(savedScrollPos, {duration: 0});
})
.on('closed', '[data-remodal-id]', function (e) {
	setTimeout(function(){
		//console.log('closed');
		$('body, html').removeAttr('style');
		scrollTo(savedScrollPos, {duration: 0});
		setTimeout(function(){
			screenFade('out',250);
		}, 250)
	}, 0);
});

/**********************************************************************************\
  open PDFs, docs, external site links (start with http://), etc in a new window
\**********************************************************************************/

//Now includes google analytics integration

var file_types = ['pdf','doc','docx','xls','xlsx','ppt','pptx','txt','mp3'];
var image_types = ['jpg','gif','png'];

$('a:not([href^="javascript"])').each(function(i){
	var href = $(this).attr('href');

	if (typeof href !== 'undefined'){
	//for download links and image links
		var file_type = href.substr((href.lastIndexOf('.') +1)).toLowerCase();

		//if file type is in the accepted list of file types...
		if ($.inArray(file_type,file_types) > -1){
			$(this).addClass('downloadLink-JS').addClass('downloadLink--'+file_type+'-JS');

		//if file type is an image and is on a touch device
		} else if ($.inArray(file_type,image_types) > -1 && $('html').hasClass('touch')){
			$(this).addClass('imageLink-JS');
		};

	//Share links

		var isLinkedId = href.match("^http://www.linkedin.com"),
			isTwitter = href.match("^http://twitter.com/intent/tweet"),
			isFacebook = href.match("^http://www.facebook.com/sharer"),
			isEmail = href.match("^mailto:?")
			baseShareClass = 'shareLink';

		if ( isLinkedId || isTwitter ||	isFacebook){
			$(this).addClass(baseShareClass+'-JS');
		};

		if (isLinkedId) {
			$(this).addClass(baseShareClass+'--linkedIn-JS');

		} else if (isTwitter) {
			$(this).addClass(baseShareClass+'--twitter-JS');

		} else if (isFacebook) {
			$(this).addClass(baseShareClass+'--facebook-JS');

		} else if (isEmail) {
			$(this).addClass('emailShare-JS');
		}

	//podcast link
		if (href.match('^http://www.itunes.com')){
			$(this).addClass('podcastLink-JS');
		};

	//External links
		if (
			href.match("^http") &&
			href.indexOf(window.location.host) === -1 &&
			!$(this).hasClass('shareLink-JS') &&
			!$(this).hasClass('podcastLink-JS')
		){
			$(this).addClass('externalLink-JS');
		};

	};

	//once all links have been processed
	if (i == $('a:not([href^="javascript"])').length - 1){
		//any specific new window links get listed here
		var all_new_window_links = '.downloadLink-JS, .imageLink-JS, .externalLink-JS, .podcastLink-JS';

		//Google analytics download tracking
		$('body').on('click','.downloadLink-JS', function(){
			var url = $(this).attr('href');
			var classStart = 'downloadLink--';
			var self = $(this);
			var text = self.text();

			$.each(file_types, function(i){
				var extension = file_types[i];
				if (self.hasClass(classStart+extension+'-JS')) {
					trackEvent('Download - ' + extension, 'click', G_pageTitle + ' | ' + text + ' | ' + url);
				}
			});
		});

		//Google analytics external link tracking
		$('body').on('click','.externalLink-JS', function(){
			var url = $(this).attr('href');
			trackEvent('Outbound', 'click', G_pageTitle + ' | ' + url);
		});

		//Google analytics external link tracking
		$('body').on('click','.podcastLink-JS', function(){
			var url = $(this).attr('href');
			trackEvent('Podcast', 'click', G_pageTitle + ' | ' + url);
		});

		$('body').on('click','.emailShare-JS', function(){
			trackEvent('Email share', 'click', G_pageTitle);
		});

		//Share link functionality and Google analytics tracking
		$('body').on('click','.shareLink-JS', function(e){
			preventDefault(e);
			var url = $(this).attr('href');

			var classStart = 'shareLink--';

			if ($(this).hasClass(classStart + 'twitter-JS')){
				var window_name = "Share on Twitter";
				var width = 600;
				var height = 260;
				trackEvent('Twitter share', 'click', G_pageTitle);

			} else if ($(this).hasClass(classStart + 'linkedIn-JS')){
				var window_name = "Share on LinkedIn"
				var width = 600;
				var height = 400;
				trackEvent('LinkedIn share', 'click', G_pageTitle);

			} else if ($(this).hasClass(classStart + 'facebook-JS')){
				var window_name = "Share on Facebook"
				var width = 600;
				var height = 400;
				trackEvent('Facebook share', 'click', G_pageTitle);
			}

		    // Fixes dual-screen position                         Most browsers      Firefox
		    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
		    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

		    w = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
		    h = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;


		    var left = ((w / 2) - (width / 2)) + dualScreenLeft;
		    var top = ((h / 2) - (height / 2)) + dualScreenTop;

			window.open(url, window_name, 'scrollbars=yes, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);
		});

		$(all_new_window_links).addClass("newWindow-JS");

		$('body').on('click', all_new_window_links, function(e){
			//return false; //uncomment to help with testing so you don't get redirected while testing GA code.
			preventDefault(e);
			window.open($(this).attr('href'));
		})
	}
});

//Code for tracking Google Analytics events
function trackEvent(category,action,label) {
	//".replace(/(\r\n|\n|\r)/gm,"")" removes any line breaks
	var eventCat = category.replace(/(\r\n|\n|\r)/gm,"").trim();
	var eventAct = action.replace(/(\r\n|\n|\r)/gm,"").trim().toLowerCase();
	var eventLabel = label.replace(/(\r\n|\n|\r)/gm,"").trim();

    try {
        ga('send', 'event', eventCat, eventAct, eventLabel); //Uncomment when Google Analytics has been incorporated into the site
        //console.log("GA event = category: " + eventCat + ", action: " + eventAct + ", label: " + eventLabel);
		//return false; //uncomment to help with testing so you don't get redirected while testing GA code.
    } catch(err){}

}


var module_popins = 'popins';

module = module_popins;

moduleTargets[module] = {
    //js hooks
    popins : module,

    //class modifiers
    isActivated: module+'__item--isActivated-JS',
};

$(Hook('popins')).each(function(){
	var _this = $(this);

	var popinsScene = new ScrollMagic.Scene({
		triggerElement: this
	})
	//.addIndicators()
	.on('enter',function(){
		module = module_popins;

		_this.rapidStages({
			activationName: Span('isActivated')
		})
	})
	.on('leave',function(){
		module = module_popins;

		//_this.removeStages(Span('isActivated'));
	})
	.addTo(G_ctrl);
});

var module_skipLinks = 'skipLinks';

module = module_skipLinks;

moduleTargets[module] = {
    //js hooks
	link : module+'__link',
	nextContentBlock : module+'__nextContentBlock',
	skipToNav : module+'__skipToNav',
	sideNav : module+'__sideNav',
	target : module+'__target'
};

$(Hook('nextContentBlock')).last().remove();

if (!$(Hook('sideNav')).length){
	$(Hook('skipToNav')).remove();
}

$(Hook('link')).scrollToTarget();
var module_socialShare = 'socialShare';

module = module_socialShare;

moduleTargets[module] = {
    //js hooks
	visShifter : module+'__visShifter',
	visScrollTrigger : module+'__visScrollTrigger',
	visBtnTrigger_hide : module+'__visBtnTrigger--hide',
	visBtnTrigger_show : module+'__visBtnTrigger--show',
	visBtnTrigger_toggle : module+'__visBtnTrigger--toggle',

	//css classes
	isHidden_btn : module+'__visShifter--isBtnHidden-JS',
	isHidden_scroll : module+'__visShifter--isScrollHidden-JS'
};

function hasHiddenClass(type) {
	module = module_socialShare;
	return $(Hook('visShifter')).modHasClass('isHidden_'+type);
}

$(Hook('visBtnTrigger_hide')).click(function(){
	module = module_socialShare;
	if (!hasHiddenClass('scroll')){
		$(Hook('visShifter')).modAddClass('isHidden_btn').fadeOut();
	}
});

$(Hook('visBtnTrigger_show')).click(function(){
	module = module_socialShare;
	if (!hasHiddenClass('scroll')){
		$(Hook('visShifter')).modRemoveClass('isHidden_btn').fadeIn();
	}
});

$(Hook('visBtnTrigger_toggle')).click(function(){
	module = module_socialShare;
	if (!hasHiddenClass('scroll')){
		$(Hook('visShifter')).modToggleClass('isHidden_btn').fadeToggle();
	}
});

if ($(Hook('visScrollTrigger')).length) {
	var socialShareScene = new ScrollMagic.Scene({
		triggerElement: Hook('visScrollTrigger'),
		triggerHook: 'onEnter'
	})
	//.addIndicators()
	.on('enter',function(){
		module = module_socialShare;
		if (!hasHiddenClass('btn')){
			$(Hook('visShifter')).modAddClass('isHidden_scroll').fadeOut();
		}
	})
	.on('leave',function(){
		module = module_socialShare;
		if (!hasHiddenClass('btn')){
			$(Hook('visShifter')).modRemoveClass('isHidden_scroll').fadeIn();
		}
	})
	.addTo(G_ctrl);

}


if ($('table').length){
	$('table').wrap('<div class="tableWrap-JS"></div>');
}



$('[data-jshook*="tiltParallax__scene"]').parallax();

var module_videoBlock = 'videoBlock';

module = module_videoBlock;

moduleTargets[module] = {

    //js hooks
	playBtn : module+'__playBtn',
    overlay : module+'__overlay',

	//css classes
	overlay_isClosed : module+'__overlay--isClosed-JS',
};

//$('')


$(Hook('playBtn')).click(function(e){
	module = module_videoBlock;

	preventDefault(e);
	targetID = $(this).attr('href').substr(1);

	callPlayer(targetID, function() {
	    // This function runs once the player is ready ("onYouTubePlayerReady")
	    callPlayer(targetID, "playVideo");
	});

	$(Hook('overlay')).modAddClass('overlay_isClosed');

});

//!!DO NOT EDIT!!!
//document.ready closing bracket (it will be correct in the merged js file)

});//end of document.ready function
