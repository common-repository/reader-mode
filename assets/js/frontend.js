(()=>{"use strict";function t(e){return t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},t(e)}function e(){/*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */e=function(){return r};var r={},n=Object.prototype,o=n.hasOwnProperty,a="function"==typeof Symbol?Symbol:{},i=a.iterator||"@@iterator",c=a.asyncIterator||"@@asyncIterator",u=a.toStringTag||"@@toStringTag";function s(t,e,r){return Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}),t[e]}try{s({},"")}catch(t){s=function(t,e,r){return t[e]=r}}function l(t,e,r,n){var o=e&&e.prototype instanceof h?e:h,a=Object.create(o.prototype),i=new j(n||[]);return a._invoke=function(t,e,r){var n="suspendedStart";return function(o,a){if("executing"===n)throw new Error("Generator is already running");if("completed"===n){if("throw"===o)throw a;return T()}for(r.method=o,r.arg=a;;){var i=r.delegate;if(i){var c=x(i,r);if(c){if(c===f)continue;return c}}if("next"===r.method)r.sent=r._sent=r.arg;else if("throw"===r.method){if("suspendedStart"===n)throw n="completed",r.arg;r.dispatchException(r.arg)}else"return"===r.method&&r.abrupt("return",r.arg);n="executing";var u=d(t,e,r);if("normal"===u.type){if(n=r.done?"completed":"suspendedYield",u.arg===f)continue;return{value:u.arg,done:r.done}}"throw"===u.type&&(n="completed",r.method="throw",r.arg=u.arg)}}}(t,r,i),a}function d(t,e,r){try{return{type:"normal",arg:t.call(e,r)}}catch(t){return{type:"throw",arg:t}}}r.wrap=l;var f={};function h(){}function p(){}function y(){}var m={};s(m,i,(function(){return this}));var v=Object.getPrototypeOf,g=v&&v(v(k([])));g&&g!==n&&o.call(g,i)&&(m=g);var w=y.prototype=h.prototype=Object.create(m);function b(t){["next","throw","return"].forEach((function(e){s(t,e,(function(t){return this._invoke(e,t)}))}))}function E(e,r){function n(a,i,c,u){var s=d(e[a],e,i);if("throw"!==s.type){var l=s.arg,f=l.value;return f&&"object"==t(f)&&o.call(f,"__await")?r.resolve(f.__await).then((function(t){n("next",t,c,u)}),(function(t){n("throw",t,c,u)})):r.resolve(f).then((function(t){l.value=t,c(l)}),(function(t){return n("throw",t,c,u)}))}u(s.arg)}var a;this._invoke=function(t,e){function o(){return new r((function(r,o){n(t,e,r,o)}))}return a=a?a.then(o,o):o()}}function x(t,e){var r=t.iterator[e.method];if(void 0===r){if(e.delegate=null,"throw"===e.method){if(t.iterator.return&&(e.method="return",e.arg=void 0,x(t,e),"throw"===e.method))return f;e.method="throw",e.arg=new TypeError("The iterator does not provide a 'throw' method")}return f}var n=d(r,t.iterator,e.arg);if("throw"===n.type)return e.method="throw",e.arg=n.arg,e.delegate=null,f;var o=n.arg;return o?o.done?(e[t.resultName]=o.value,e.next=t.nextLoc,"return"!==e.method&&(e.method="next",e.arg=void 0),e.delegate=null,f):o:(e.method="throw",e.arg=new TypeError("iterator result is not an object"),e.delegate=null,f)}function S(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function L(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function j(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(S,this),this.reset(!0)}function k(t){if(t){var e=t[i];if(e)return e.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var r=-1,n=function e(){for(;++r<t.length;)if(o.call(t,r))return e.value=t[r],e.done=!1,e;return e.value=void 0,e.done=!0,e};return n.next=n}}return{next:T}}function T(){return{value:void 0,done:!0}}return p.prototype=y,s(w,"constructor",y),s(y,"constructor",p),p.displayName=s(y,u,"GeneratorFunction"),r.isGeneratorFunction=function(t){var e="function"==typeof t&&t.constructor;return!!e&&(e===p||"GeneratorFunction"===(e.displayName||e.name))},r.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,y):(t.__proto__=y,s(t,u,"GeneratorFunction")),t.prototype=Object.create(w),t},r.awrap=function(t){return{__await:t}},b(E.prototype),s(E.prototype,c,(function(){return this})),r.AsyncIterator=E,r.async=function(t,e,n,o,a){void 0===a&&(a=Promise);var i=new E(l(t,e,n,o),a);return r.isGeneratorFunction(e)?i:i.next().then((function(t){return t.done?t.value:i.next()}))},b(w),s(w,u,"Generator"),s(w,i,(function(){return this})),s(w,"toString",(function(){return"[object Generator]"})),r.keys=function(t){var e=[];for(var r in t)e.push(r);return e.reverse(),function r(){for(;e.length;){var n=e.pop();if(n in t)return r.value=n,r.done=!1,r}return r.done=!0,r}},r.values=k,j.prototype={constructor:j,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=void 0,this.done=!1,this.delegate=null,this.method="next",this.arg=void 0,this.tryEntries.forEach(L),!t)for(var e in this)"t"===e.charAt(0)&&o.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=void 0)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var e=this;function r(r,n){return i.type="throw",i.arg=t,e.next=r,n&&(e.method="next",e.arg=void 0),!!n}for(var n=this.tryEntries.length-1;n>=0;--n){var a=this.tryEntries[n],i=a.completion;if("root"===a.tryLoc)return r("end");if(a.tryLoc<=this.prev){var c=o.call(a,"catchLoc"),u=o.call(a,"finallyLoc");if(c&&u){if(this.prev<a.catchLoc)return r(a.catchLoc,!0);if(this.prev<a.finallyLoc)return r(a.finallyLoc)}else if(c){if(this.prev<a.catchLoc)return r(a.catchLoc,!0)}else{if(!u)throw new Error("try statement without catch or finally");if(this.prev<a.finallyLoc)return r(a.finallyLoc)}}}},abrupt:function(t,e){for(var r=this.tryEntries.length-1;r>=0;--r){var n=this.tryEntries[r];if(n.tryLoc<=this.prev&&o.call(n,"finallyLoc")&&this.prev<n.finallyLoc){var a=n;break}}a&&("break"===t||"continue"===t)&&a.tryLoc<=e&&e<=a.finallyLoc&&(a=null);var i=a?a.completion:{};return i.type=t,i.arg=e,a?(this.method="next",this.next=a.finallyLoc,f):this.complete(i)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),f},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.finallyLoc===t)return this.complete(r.completion,r.afterLoc),L(r),f}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var r=this.tryEntries[e];if(r.tryLoc===t){var n=r.completion;if("throw"===n.type){var o=n.arg;L(r)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(t,e,r){return this.delegate={iterator:k(t),resultName:e,nextLoc:r},"next"===this.method&&(this.arg=void 0),f}},r}function r(t,e){var r="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!r){if(Array.isArray(t)||(r=i(t))||e&&t&&"number"==typeof t.length){r&&(t=r);var n=0,o=function(){};return{s:o,n:function(){return n>=t.length?{done:!0}:{done:!1,value:t[n++]}},e:function(t){throw t},f:o}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var a,c=!0,u=!1;return{s:function(){r=r.call(t)},n:function(){var t=r.next();return c=t.done,t},e:function(t){u=!0,a=t},f:function(){try{c||null==r.return||r.return()}finally{if(u)throw a}}}}function n(t){return function(t){if(Array.isArray(t))return c(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||i(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function o(t,e,r,n,o,a,i){try{var c=t[a](i),u=c.value}catch(t){return void r(t)}c.done?e(u):Promise.resolve(u).then(n,o)}function a(t){return function(){var e=this,r=arguments;return new Promise((function(n,a){var i=t.apply(e,r);function c(t){o(i,n,a,c,u,"next",t)}function u(t){o(i,n,a,c,u,"throw",t)}c(void 0)}))}}function i(t,e){if(t){if("string"==typeof t)return c(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);return"Object"===r&&t.constructor&&(r=t.constructor.name),"Map"===r||"Set"===r?Array.from(t):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?c(t,e):void 0}}function c(t,e){(null==e||e>t.length)&&(e=t.length);for(var r=0,n=new Array(e);r<e;r++)n[r]=t[r];return n}var u,s,l=function(t,o){var i=jQuery,c=i("body");"true"===c.attr("data-speech")?tts.buttons.stop.click():"undefined"==typeof tts?(i.getScript(readerMode.pluginUrl+"/assets/vendor/text-to-speech/engines/watson.js"),i.getScript(readerMode.pluginUrl+"/assets/vendor/text-to-speech/engines/translate.js"),i.getScript(readerMode.pluginUrl+"/assets/vendor/text-to-speech/vendors/sentence-boundary-detection/sbd.js"),i.getScript(readerMode.pluginUrl+"/assets/vendor/text-to-speech/tts.js",a(e().mark((function t(){var a,u;return e().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(i("head").append('<meta name="referrer" content="no-referrer">'),c.attr("data-speech","true"),o=o?document.querySelector(".entry-content"):document.querySelector(".reader-mode-content"),window.tts=new TTS(document,{separator:"\n!\n",contentElement:o}),0!==(u=n(o.querySelectorAll(" p, section, h1, h2, h3, h4, li, td, th"))).length){t.next=7;break}return t.abrupt("return",alert("Cannot find speech content!"));case 7:return(a=tts).feed.apply(a,n(u.filter((function(t){return t})))),t.next=10,tts.attach(document.getElementById("reader-mode-tts"));case 10:return t.next=12,tts.ready();case 12:tts.jump=function(){c.attr("data-speech","true");var t=window.getSelection();if(t&&t.rangeCount&&t.toString().trim().length){var e;t.getRangeAt?e=t.getRangeAt(0):((e=document.createRange()).setStart(t.anchorNode,t.anchorOffset),e.setEnd(t.focusNode,t.focusOffset));var n=e.commonAncestorContainer;n.nodeType!==n.ELEMENT_NODE&&(n=n.parentElement);var o=tts.sections.filter((function(t){var e,o=r(t.targets?t.targets:[t.target||t]);try{for(o.s();!(e=o.n()).done;){var a,i=e.value;if(i===n||i.target===n)return!0;if((i.target||i).nodeType===Node.ELEMENT_NODE)if(n.contains(i.target||i)||null!==(a=i.target||i)&&void 0!==a&&a.contains(n))return!0}}catch(t){o.e(t)}finally{o.f()}}));if(o.length){var a=tts.sections.indexOf(o[0]);return tts.navigate(void 0,a),!0}}},!0!==tts.jump()&&tts.buttons.play.click();case 14:case"end":return t.stop()}}),t)}))))):!0!==tts.jump()&&(c.attr("data-speech","true"),tts.buttons.play.click())},d=function(){var t=document.querySelector(".reader-mode-progress");if(t){var e=(document.body.scrollTop||document.documentElement.scrollTop)/(document.documentElement.scrollHeight-document.documentElement.clientHeight)*100;t.style.setProperty("width",e+"%")}};u=jQuery,s={readerHTML:null,init:function(){s.excludeButtons()},ready:function(){d(),u(window).on("scroll",d),u(".reader-mode-button").on("click",s.handleReaderMode),u(".reader-mode-tts").on("click",l),u(document).on("keydown",s.handleKeys),s.initTranslation()},handleReaderMode:function(t){t.preventDefault();var e=u(this).data("post-id");if(e){var r=u("body"),n=u("#reader-mode-iframe-".concat(e));if(n.length)r.addClass("reader-mode-enabled"),n.addClass("active");else{r.addClass("reader-mode-enabled");var o='<iframe src="'.concat(readerMode.siteUrl,"/?reader-mode=").concat(e,'" class="reader-mode-iframe active" id="reader-mode-iframe-').concat(e,'"></iframe>');r.append(o)}}},initTranslation:function(){document.getElementById("reader-mode-translation")&&function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:function(){},e=jQuery,r=e("html").attr("lang");e.getScript("https://translate.google.com/translate_a/element.js?cb=readerModeTranslateInit",(function(){t(),window.readerModeTranslateInit=function(){new google.translate.TranslateElement({pageLanguage:r,layout:google.translate.TranslateElement.InlineLayout.SIMPLE,autoDisplay:!1},"reader-mode-translation"),e(".goog-te-gadget").append('<div class="reader-mode-translation-reset">Show Original</div>');var t=e(".goog-te-gadget-icon");t.css("--translation-icon-image")&&t.addClass("custom-icon"),t.wrap('<span class="translation-icon-wrap"></span>')},e(document).on("click",".reader-mode-translation-reset",(function(t){e("#\\:2\\.container").contents().find("#\\:2\\.restore").click()})),e(document).on("DOMSubtreeModified",".goog-te-menu-value > span:first-child",(function(){var t=e(".reader-mode-translation-reset");"Select Language"===e(this).text()?t.addClass("hidden"):t.removeClass("hidden")}))}))}()},handleKeys:function(t){27===t.keyCode&&"undefined"!=typeof tts&&!0===u("body").data("speech")&&tts.buttons.stop.click(),32===t.keyCode&&"undefined"!=typeof tts&&!0===u("body").data("speech")&&(t.preventDefault(),tts.buttons.play.click())},excludeButtons:function(){u(".reader-mode-buttons").each((function(){u(this).parents("nav, #comments").length&&u(this).remove()}))}},s.init(),u(document).ready(s.ready)})();