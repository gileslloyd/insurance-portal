(function(t){function e(e){for(var s,o,i=e[0],c=e[1],l=e[2],d=0,f=[];d<i.length;d++)o=i[d],a[o]&&f.push(a[o][0]),a[o]=0;for(s in c)Object.prototype.hasOwnProperty.call(c,s)&&(t[s]=c[s]);u&&u(e);while(f.length)f.shift()();return r.push.apply(r,l||[]),n()}function n(){for(var t,e=0;e<r.length;e++){for(var n=r[e],s=!0,i=1;i<n.length;i++){var c=n[i];0!==a[c]&&(s=!1)}s&&(r.splice(e--,1),t=o(o.s=n[0]))}return t}var s={},a={app:0},r=[];function o(e){if(s[e])return s[e].exports;var n=s[e]={i:e,l:!1,exports:{}};return t[e].call(n.exports,n,n.exports,o),n.l=!0,n.exports}o.m=t,o.c=s,o.d=function(t,e,n){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},o.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var s in t)o.d(n,s,function(e){return t[e]}.bind(null,s));return n},o.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="/";var i=window["webpackJsonp"]=window["webpackJsonp"]||[],c=i.push.bind(i);i.push=e,i=i.slice();for(var l=0;l<i.length;l++)e(i[l]);var u=c;r.push([0,"chunk-vendors"]),n()})({0:function(t,e,n){t.exports=n("56d7")},"034f":function(t,e,n){"use strict";var s=n("64a9"),a=n.n(s);a.a},"56d7":function(t,e,n){"use strict";n.r(e);n("cadf"),n("551c"),n("f751"),n("097d");var s=n("2b0e"),a=n("8c4f"),r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[t._m(0),n("section",{staticClass:"section"},[n("div",{staticClass:"container"},[n("router-view")],1)])])},o=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("section",{staticClass:"hero is-primary is-small"},[n("div",{staticClass:"hero-body"},[n("div",{staticClass:"container has-text-centered"},[n("h2",{staticClass:"title"},[t._v("\n                    ITC Compliance\n                ")])])])])}],i={name:"app"},c=i,l=(n("034f"),n("2877")),u=Object(l["a"])(c,r,o,!1,null,null,null),d=u.exports,f=[{path:"/",component:n("e6dc").default,meta:{requiresAuth:!0}}],p=new a["a"]({routes:f}),v=p;n("92c6");s["a"].config.productionTip=!1,s["a"].use(a["a"]),new s["a"]({render:function(t){return t(d)},router:v}).$mount("#app")},"64a9":function(t,e,n){},8911:function(t,e,n){"use strict";var s=n("ef38"),a=n.n(s);a.a},e6dc:function(t,e,n){"use strict";n.r(e);var s=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("section",[n("div",{attrs:{id:"product-list"}},[n("div",{staticClass:"product-card"},[t._m(0),n("div",{staticClass:"content"},[n("h1",{directives:[{name:"show",rawName:"v-show",value:t.loading,expression:"loading"}],staticClass:"loading subtitle is-5"},[t._v("Fetching Products....")]),n("section",{staticClass:"product-list"},[t._l(t.products,(function(e){return[n("div",{staticClass:"product-item"},[t._v(t._s(e.name))]),n("div",{staticClass:"product-item"},[n("a",{attrs:{href:""},on:{click:function(n){return n.preventDefault(),t.showDetails(e.id)}}},[t._v("More Info")])])]}))],2)])])]),n("modal",{directives:[{name:"show",rawName:"v-show",value:t.modalIsVisible,expression:"modalIsVisible"}],on:{close:function(e){t.modalIsVisible=!1}},scopedSlots:t._u([{key:"title",fn:function(){return[t._v(t._s(t.selectedProduct.name))]},proxy:!0}])},[n("p",[t._v(t._s(t.selectedProduct.description))]),n("table",{staticClass:"table"},[n("tr",[n("td",[t._v("Type")]),n("td",[t._v(t._s(t.selectedProduct.type))])]),n("tr",[n("td",[t._v("Suppliers")]),n("td",[n("ul",t._l(t.selectedProduct.suppliers,(function(e){return n("li",[t._v(t._s(e))])})),0)])])])])],1)},a=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"card-title"},[n("h1",[t._v("Our Insurance Products")])])}],r=n("bc3a"),o=n.n(r);o.a.defaults.headers.common["x-api-key"]="C6E84D247E2D81B5B45D6D2D229D9";var i={config:{domain:"http://localhost:8080/"},get:function(t,e){o.a.get(this.config.domain+t).then(e)}},c=i,l=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"modal is-active"},[n("div",{staticClass:"modal-background"}),n("div",{staticClass:"modal-card"},[n("header",{staticClass:"modal-card-head"},[n("p",{staticClass:"modal-card-title"},[t._t("title")],2)]),n("section",{staticClass:"modal-card-body"},[t._t("default")],2),n("footer",{staticClass:"modal-card-foot"},[n("button",{staticClass:"button  is-success",on:{click:function(e){return e.preventDefault(),t.$emit("close")}}},[t._v("OK")])])])])},u=[],d={name:"modal"},f=d,p=n("2877"),v=Object(p["a"])(f,l,u,!1,null,null,null),m=v.exports,h={name:"Products",components:{modal:m},data:function(){return{products:[],modalIsVisible:!1,loading:!0,selectedProduct:{}}},mounted:function(){var t=this;c.get("products",(function(e){t.products=e.data.body,t.loading=!1}))},methods:{showDetails:function(t){var e=this;c.get("product/"+t,(function(t){e.selectedProduct=t.data.body,e.modalIsVisible=!0}))}}},_=h,b=(n("8911"),Object(p["a"])(_,s,a,!1,null,"00e51706",null));e["default"]=b.exports},ef38:function(t,e,n){}});
//# sourceMappingURL=app.cbf09922.js.map