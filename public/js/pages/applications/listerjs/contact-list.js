"use strict";$(document).ready(function(){var u=$(window).width();new Lister({el:".contacts-list-1",url:contact_list_1_url,search:!1,per_page:8,templates:{row:function(t,a){return'\n\t\t\t\t\t\t<li class="list-group-item">\n\t\t\t\t\t\t\t<div class="user-avatar m-2">\n\t\t\t\t\t\t\t\t<img src="'+ROOT_URL+t.image+'" class="avatar avatar-1 rounded-circle" alt="Avatar image">\n\t\t\t\t\t\t\t\t<span class="badge badge-'+(1==t.is_online?"success":"secondary")+' color-badge badge-size-1"></span>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<a href="#">'+t.name+'</a>\n\t\t\t\t\t\t\t<div class="btn-group ml-auto" role="group" aria-label="Basic example">\n\t\t\t\t\t\t\t\t<button type="button" class="btn btn-sm btn-success-lightened"><i class="fas fa-video"></i></button>\n\t\t\t\t\t\t\t\t<button type="button" class="btn btn-sm btn-success-lightened"><i class="fas fa-phone"></i></button>\n\t\t\t\t\t\t\t\t<button type="button" class="btn btn-sm btn-success-lightened"><i class="fas fa-comment-dots"></i></button>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</li>'},wrapper:function(){return'<ul class="list-group contact-list-mini no-borders lister-template-root"></ul>\n\t\t\t\t\t\t<hr class="mb-0">'},pagination:function(t){var a=[],s=7;if(!t.hasPages())return"";if(a.push('\n\t\t\t\t<nav aria-label="Page navigation example">\n\t\t\t\t\t<ul class="pagination justify-content-center pagination-sm pagination-round pagination-hard-square my-3">\n\t\t\t\t'),t.onFirstPage())a.push('\n\t\t\t\t\t\t\t\t<li class="page-item disabled">\n\t\t\t\t\t\t\t\t\t<span class="page-link" aria-label="Previous">\n\t\t\t\t\t\t\t\t\t\t<i class="fas fa-angle-left"></i>\n\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t');else{var e=t.currentPage()-1;a.push('\n\t\t\t\t\t\t\t\t<li class="page-item">\n\t\t\t\t\t\t\t\t\t<a class="page-link" data-page="'+e+'" href="javascript:void(0)" rel="prev" aria-label="Previous">\n\t\t\t\t\t\t\t\t\t\t<i class="fas fa-angle-left"></i>\n\t\t\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t')}var n=function(t,a){return a==t.currentPage()?'\n\t\t\t\t\t\t\t\t<li class="page-item active" aria-current="page"><span class="page-link">'+a+"</span></li>\n\t\t\t\t\t\t":'\n\t\t\t\t\t\t\t\t<li class="page-item" aria-current="page"><a data-page="'+a+'" href="javascript:void(0)" class="page-link">'+a+"</a></li>\n\t\t\t\t\t\t"};if(u<500&&(s=5),t.totalPages()>s){a.push(n(t,1));var i=2,l=t.totalPages()-1;u<500?(t.currentPage()<=3?(i=2,l=3):i=l=t.currentPage(),t.totalPages()-t.currentPage()<3&&(i=t.totalPages()-2,l=t.totalPages()-1)):(l=t.currentPage()<5?(i=2,5):(i=t.currentPage()-1,t.currentPage()+1),t.totalPages()-t.currentPage()<5&&(i=t.totalPages()-4,l=t.totalPages()-1)),2<i&&a.push('<li class="page-item disabled" aria-current="page"><span class="page-link">...</span></li>');for(var r=i;r<=l;r++)a.push(n(t,r));2<t.totalPages()-l&&a.push('<li class="page-item disabled" aria-current="page"><span class="page-link">...</span></li>'),a.push(n(t,t.totalPages()))}else for(var c=1;c<=t.totalPages();c++)a.push(n(t,c));if(t.hasMorePages()){var o=t.currentPage()+1;a.push('\n\t\t\t\t\t\t\t\t<li class="page-item">\n\t\t\t\t\t\t\t\t\t<a class="page-link" data-page="'+o+'" href="javascript:void(0)" rel="next" aria-label="Next">\n\t\t\t\t\t\t\t\t\t\t<i class="fas fa-angle-right"></i>\n\t\t\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t')}else a.push('\n\t\t\t\t\t\t\t\t<li class="page-item disabled" aria-disabled="true" aria-label="Next">\n\t\t\t\t\t\t\t\t\t<span class="page-link">\n\t\t\t\t\t\t\t\t\t\t<i class="fas fa-angle-right"></i>\n\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t\t\t\t');return a.push("\n\t\t\t\t\t</ul>\n\t\t\t\t</nav>\n\t\t\t\t"),a.join("\n")}}}),new Lister({el:".contacts-list-2",url:contact_list_2_url,search:!1,per_page:8,templates:{row:function(t,a){return'\n\t\t\t\t\t\t<li class="list-group-item">\n\t\t\t\t\t\t\t<div class="user-avatar m-2">\n\t\t\t\t\t\t\t\t<img src="'+ROOT_URL+t.image+'" class="avatar avatar-1 rounded-circle" alt="Avatar image">\n\t\t\t\t\t\t\t\t<span class="badge badge-'+(1==t.is_online?"success":"secondary")+' color-badge badge-size-1"></span>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<a href="#">'+t.name+'</a>\n\t\t\t\t\t\t\t<div class="btn-group ml-auto" role="group" aria-label="Basic example">\n\t\t\t\t\t\t\t\t<button type="button" class="btn btn-sm btn-success-lightened"><i class="fas fa-video"></i></button>\n\t\t\t\t\t\t\t\t<button type="button" class="btn btn-sm btn-success-lightened"><i class="fas fa-phone"></i></button>\n\t\t\t\t\t\t\t\t<button type="button" class="btn btn-sm btn-success-lightened"><i class="fas fa-comment-dots"></i></button>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</li>'},wrapper:function(){return'<ul class="list-group contact-list-mini no-borders lister-template-root"></ul>\n\t\t\t\t\t\t<hr class="mb-0">'},lazyLoader:function(t){return t.hasPages()&&t.hasMorePages()?'\n\t\t\t\t\t\t<div class="load-more">\n\t\t\t\t\t\t\t<button type="button" class="btn btn-block border-0 rounded-0 btn-lg btn-light btn-ellipsis-loader py-4 load-more-btn" data-page="'+(t.currentPage()+1)+'">\n\t\t\t\t\t\t\t\t<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>\n\t\t\t\t\t\t\t</button>\n\t\t\t\t\t\t</div>':""}},lazy_load:!0})});