/*

	Iridium by TEMPLATED

    templated.co @templatedco

    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)

*/

skel.init({

prefix: prefixUrl+'/css/style', //prefixUrl variable comes from php template

resetCSS: true,

boxModel: 'border',

grid: {

gutters: 50

},

breakpoints: {

'mobile': {

range: '-780',

lockViewport: true,

containers: 'fluid',

grid: {

collapse: true,

gutters: 10

}

},

'desktop': {

range: '781-',

containers: 1200

},

'1000px': {

range: '781-1200',

containers: 960

}

}

}, {

panels: {

panels: {

navPanel: {

breakpoints: 'mobile',position: 'left',style: 'reveal',size: '80%',html: '<div data-action="navList" data-args="nav"></div>'

}

},

overlays: {

titleBar: {

breakpoints: 'mobile',position: 'top-left',height: 44,width: '100%',

html: '<span class="toggle" data-action="togglePanel" data-args="navPanel"></span>' +

 '<span class="title" data-action="copyHTML" data-args="logo"></span>'

	}

	}

}	

});

