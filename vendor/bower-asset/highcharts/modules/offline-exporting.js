/*
 Highcharts JS v7.1.1 (2019-04-09)

 Client side exporting module

 (c) 2015-2019 Torstein Honsi / Oystein Moseng

 License: www.highcharts.com/license
*/
(function(b){"object"===typeof module&&module.exports?(b["default"]=b,module.exports=b):"function"===typeof define&&define.amd?define("highcharts/modules/offline-exporting",["highcharts","highcharts/modules/exporting"],function(q){b(q);b.Highcharts=q;return b}):b("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(b){function q(a,e,b,p){a.hasOwnProperty(e)||(a[e]=p.apply(null,b))}b=b?b._modules:{};q(b,"mixins/download-url.js",[b["parts/Globals.js"]],function(a){var e=a.win,b=e.navigator,
p=e.document,d=e.URL||e.webkitURL||e,t=/Edge\/\d+/.test(b.userAgent);a.dataURLtoBlob=function(a){if((a=a.match(/data:([^;]*)(;base64)?,([0-9A-Za-z+/]+)/))&&3<a.length&&e.atob&&e.ArrayBuffer&&e.Uint8Array&&e.Blob&&d.createObjectURL){for(var b=e.atob(a[3]),f=new e.ArrayBuffer(b.length),f=new e.Uint8Array(f),h=0;h<f.length;++h)f[h]=b.charCodeAt(h);a=new e.Blob([f],{type:a[1]});return d.createObjectURL(a)}};a.downloadURL=function(f,d){var g=p.createElement("a"),h;if("string"===typeof f||f instanceof String||
!b.msSaveOrOpenBlob){if(t||2E6<f.length)if(f=a.dataURLtoBlob(f),!f)throw Error("Failed to convert to blob");if(void 0!==g.download)g.href=f,g.download=d,p.body.appendChild(g),g.click(),p.body.removeChild(g);else try{if(h=e.open(f,"chart"),void 0===h||null===h)throw Error("Failed to open window");}catch(m){e.location.href=f}}else b.msSaveOrOpenBlob(f,d)}});q(b,"modules/offline-exporting.src.js",[b["parts/Globals.js"]],function(a){function b(b,z){var k=f.getElementsByTagName("head")[0],c=f.createElement("script");
c.type="text/javascript";c.src=b;c.onload=z;c.onerror=function(){a.error("Error loading script "+b)};k.appendChild(c)}var q=a.addEvent,p=a.merge,d=a.win,t=d.navigator,f=d.document,A=d.URL||d.webkitURL||d,g=/Edge\/|Trident\/|MSIE /.test(t.userAgent),h=g?150:0;a.CanVGRenderer={};a.svgToDataUrl=function(a){var b=-1<t.userAgent.indexOf("WebKit")&&0>t.userAgent.indexOf("Chrome");try{if(!b&&0>t.userAgent.toLowerCase().indexOf("firefox"))return A.createObjectURL(new d.Blob([a],{type:"image/svg+xml;charset-utf-16"}))}catch(k){}return"data:image/svg+xml;charset\x3dUTF-8,"+
encodeURIComponent(a)};a.imageToDataUrl=function(a,b,k,c,e,y,v,g,w){var l=new d.Image,n,m=function(){setTimeout(function(){var d=f.createElement("canvas"),m=d.getContext&&d.getContext("2d"),r;try{if(m){d.height=l.height*c;d.width=l.width*c;m.drawImage(l,0,0,d.width,d.height);try{r=d.toDataURL(b),e(r,b,k,c)}catch(B){n(a,b,k,c)}}else v(a,b,k,c)}finally{w&&w(a,b,k,c)}},h)},x=function(){g(a,b,k,c);w&&w(a,b,k,c)};n=function(){l=new d.Image;n=y;l.crossOrigin="Anonymous";l.onload=m;l.onerror=x;l.src=a};
l.onload=m;l.onerror=x;l.src=a};a.downloadSVGLocal=function(e,g,k,c){function x(a,b){b=new d.jsPDF("l","pt",[a.width.baseVal.value+2*b,a.height.baseVal.value+2*b]);[].forEach.call(a.querySelectorAll('*[visibility\x3d"hidden"]'),function(a){a.parentNode.removeChild(a)});d.svg2pdf(a,b,{removeInvalid:!0});return b.output("datauristring")}function y(){h.innerHTML=e;var b=h.getElementsByTagName("text"),d;[].forEach.call(b,function(a){["font-family","font-size"].forEach(function(b){for(var c=a;c&&c!==h;){if(c.style[b]){a.style[b]=
c.style[b];break}c=c.parentNode}});a.style["font-family"]=a.style["font-family"]&&a.style["font-family"].split(" ").splice(-1);d=a.getElementsByTagName("title");[].forEach.call(d,function(b){a.removeChild(b)})});b=x(h.firstChild,0);try{a.downloadURL(b,q),c&&c()}catch(C){k(C)}}var v,m,w=!0,l,n=g.libURL||a.getOptions().exporting.libURL,h=f.createElement("div"),u=g.type||"image/png",q=(g.filename||"chart")+"."+("image/svg+xml"===u?"svg":u.split("/")[1]),p=g.scale||1,n="/"!==n.slice(-1)?n+"/":n;if("image/svg+xml"===
u)try{t.msSaveOrOpenBlob?(m=new MSBlobBuilder,m.append(e),v=m.getBlob("image/svg+xml")):v=a.svgToDataUrl(e),a.downloadURL(v,q),c&&c()}catch(r){k(r)}else"application/pdf"===u?d.jsPDF&&d.svg2pdf?y():(w=!0,b(n+"jspdf.js",function(){b(n+"svg2pdf.js",function(){y()})})):(v=a.svgToDataUrl(e),l=function(){try{A.revokeObjectURL(v)}catch(r){}},a.imageToDataUrl(v,u,{},p,function(b){try{a.downloadURL(b,q),c&&c()}catch(B){k(B)}},function(){var r=f.createElement("canvas"),g=r.getContext("2d"),x=e.match(/^<svg[^>]*width\s*=\s*\"?(\d+)\"?[^>]*>/)[1]*
p,h=e.match(/^<svg[^>]*height\s*=\s*\"?(\d+)\"?[^>]*>/)[1]*p,m=function(){g.drawSvg(e,0,0,x,h);try{a.downloadURL(t.msSaveOrOpenBlob?r.msToBlob():r.toDataURL(u),q),c&&c()}catch(D){k(D)}finally{l()}};r.width=x;r.height=h;d.canvg?m():(w=!0,b(n+"rgbcolor.js",function(){b(n+"canvg.js",function(){m()})}))},k,k,function(){w&&l()}))};a.Chart.prototype.getSVGForLocalExport=function(b,d,k,c){var e=this,f,g=0,h,m,l,n,p,u,t=function(){g===f.length&&c(e.sanitizeSVG(h.innerHTML,m))},z=function(a,b,c){++g;c.imageElement.setAttributeNS("http://www.w3.org/1999/xlink",
"href",a);t()};e.unbindGetSVG=q(e,"getSVG",function(a){m=a.chartCopy.options;h=a.chartCopy.container.cloneNode(!0)});e.getSVGForExport(b,d);f=h.getElementsByTagName("image");try{if(!f.length){c(e.sanitizeSVG(h.innerHTML,m));return}n=0;for(p=f.length;n<p;++n)l=f[n],(u=l.getAttributeNS("http://www.w3.org/1999/xlink","href"))?a.imageToDataUrl(u,"image/png",{imageElement:l},b.scale,z,k,k,k):(++g,l.parentNode.removeChild(l),t())}catch(r){k(r)}e.unbindGetSVG()};a.Chart.prototype.exportChartLocal=function(b,
e){var d=this,c=a.merge(d.options.exporting,b),f=function(b){!1===c.fallbackToExportServer?c.error?c.error(c,b):a.error(28,!0):d.exportChart(c)};g&&d.styledMode&&(a.SVGRenderer.prototype.inlineWhitelist=[/^blockSize/,/^border/,/^caretColor/,/^color/,/^columnRule/,/^columnRuleColor/,/^cssFloat/,/^cursor/,/^fill$/,/^fillOpacity/,/^font/,/^inlineSize/,/^length/,/^lineHeight/,/^opacity/,/^outline/,/^parentRule/,/^rx$/,/^ry$/,/^stroke/,/^textAlign/,/^textAnchor/,/^textDecoration/,/^transform/,/^vectorEffect/,
/^visibility/,/^x$/,/^y$/]);g&&("application/pdf"===c.type||d.container.getElementsByTagName("image").length&&"image/svg+xml"!==c.type)||"application/pdf"===c.type&&d.container.getElementsByTagName("image").length?f("Image type not supported for this chart/browser."):d.getSVGForLocalExport(c,e,f,function(b){-1<b.indexOf("\x3cforeignObject")&&"image/svg+xml"!==c.type?f("Image type not supported for charts with embedded HTML"):a.downloadSVGLocal(b,a.extend({filename:d.getFilename()},c),f)})};p(!0,a.getOptions().exporting,
{libURL:"https://code.highcharts.com/7.1.1/lib/",menuItemDefinitions:{downloadPNG:{textKey:"downloadPNG",onclick:function(){this.exportChartLocal()}},downloadJPEG:{textKey:"downloadJPEG",onclick:function(){this.exportChartLocal({type:"image/jpeg"})}},downloadSVG:{textKey:"downloadSVG",onclick:function(){this.exportChartLocal({type:"image/svg+xml"})}},downloadPDF:{textKey:"downloadPDF",onclick:function(){this.exportChartLocal({type:"application/pdf"})}}}})});q(b,"masters/modules/offline-exporting.src.js",
[],function(){})});
//# sourceMappingURL=offline-exporting.js.map