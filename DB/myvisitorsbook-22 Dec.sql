-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2016 at 05:50 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myvisitorsbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbbranches`
--

CREATE TABLE `tblmvbbranches` (
  `brn_id_pk` int(11) NOT NULL,
  `brn_clientId_fk` int(11) NOT NULL,
  `brn_name` varchar(255) NOT NULL,
  `brn_countryId_fk` int(11) NOT NULL,
  `brn_stateId_fk` int(11) NOT NULL,
  `brn_cityId_fk` int(11) NOT NULL,
  `brn_address` varchar(255) NOT NULL,
  `brn_smsCredit` int(11) NOT NULL,
  `brn_emailCredit` int(11) NOT NULL,
  `brn_validity` int(11) NOT NULL,
  `brn_isChildBranch` tinyint(4) NOT NULL,
  `brn_parenBranchId_fk` int(11) NOT NULL,
  `brn_createdDate` datetime NOT NULL,
  `brn_createdBy` int(11) NOT NULL,
  `brn_modifiedDate` datetime NOT NULL,
  `brn_modifiedBy` int(11) NOT NULL,
  `brn_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbcity`
--

CREATE TABLE `tblmvbcity` (
  `cty_id_pk` int(11) NOT NULL,
  `cty_countryId_fk` int(11) NOT NULL,
  `cty_stateId_fk` int(11) NOT NULL,
  `cty_name` varchar(255) NOT NULL,
  `cty_createdDate` datetime NOT NULL,
  `cty_createdBy` int(11) NOT NULL,
  `cty_modifiedDate` datetime NOT NULL,
  `cty_modifiedBy` int(11) NOT NULL,
  `cty_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbcity`
--

INSERT INTO `tblmvbcity` (`cty_id_pk`, `cty_countryId_fk`, `cty_stateId_fk`, `cty_name`, `cty_createdDate`, `cty_createdBy`, `cty_modifiedDate`, `cty_modifiedBy`, `cty_status`) VALUES
(1, 1, 1, 'Kolhapur', '2016-11-25 05:45:55', 1, '2016-11-25 05:58:32', 1, 0),
(2, 1, 1, 'Pune', '2016-11-25 05:47:49', 1, '2016-11-25 06:09:24', 1, 1),
(3, 1, 1, 'Nashik', '2016-11-25 05:59:28', 1, '2016-11-25 05:59:28', 1, 1),
(4, 1, 1, 'Mumbai', '2016-11-25 06:06:19', 1, '2016-11-25 06:06:19', 1, 0),
(5, 1, 1, 'Satara', '2016-11-25 06:08:11', 1, '2016-11-25 06:08:11', 1, 0),
(6, 1, 1, 'Sangli', '2016-11-25 06:09:05', 1, '2016-11-25 06:09:05', 1, 1),
(7, 1, 1, 'Baramati', '2016-11-25 06:09:49', 1, '2016-11-25 06:09:49', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbclients`
--

CREATE TABLE `tblmvbclients` (
  `clnt_id_pk` int(11) NOT NULL,
  `clnt_name` text NOT NULL,
  `clnt_mobile` int(11) NOT NULL,
  `clnt_email` varchar(255) NOT NULL,
  `clnt_password` varchar(255) NOT NULL,
  `clnt_countryId_fk` int(11) NOT NULL,
  `clnt_stateId_fk` int(11) NOT NULL,
  `clnt_cityId_fk` int(11) NOT NULL,
  `clnt_address` varchar(255) NOT NULL,
  `clnt_packageId_fk` int(11) NOT NULL,
  `clnt_totalSmsCredit` int(11) NOT NULL,
  `clnt_totalEmailCredit` int(11) NOT NULL,
  `clnt_validity` int(11) NOT NULL,
  `clnt_createdDate` datetime NOT NULL,
  `clnt_createdBy` int(11) NOT NULL,
  `clnt_modifiedDate` datetime NOT NULL,
  `clnt_modifiedBy` int(11) NOT NULL,
  `clnt_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbcountry`
--

CREATE TABLE `tblmvbcountry` (
  `cntr_id_pk` int(11) NOT NULL,
  `cntr_name` varchar(255) NOT NULL,
  `cntr_createdDate` datetime NOT NULL,
  `cntr_createdBy` int(11) NOT NULL,
  `cntr_modifiedDate` datetime NOT NULL,
  `cntr_modifiedBy` int(11) NOT NULL,
  `cntr_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbcountry`
--

INSERT INTO `tblmvbcountry` (`cntr_id_pk`, `cntr_name`, `cntr_createdDate`, `cntr_createdBy`, `cntr_modifiedDate`, `cntr_modifiedBy`, `cntr_status`) VALUES
(1, 'india', '2016-11-24 10:53:35', 1, '2016-11-24 03:28:21', 2, 1),
(2, 'Shrilanka123', '2016-11-24 03:28:35', 2, '2016-12-12 11:06:26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbcustomfields`
--

CREATE TABLE `tblmvbcustomfields` (
  `cfi_id_pk` int(11) NOT NULL,
  `cfi_label` varchar(45) NOT NULL,
  `cfi_value` varchar(45) NOT NULL,
  `cfi_datatypeId_fk` int(11) NOT NULL,
  `cfi_clientId` int(11) NOT NULL,
  `cfi_status` int(11) NOT NULL,
  `cfi_createdDate` datetime NOT NULL,
  `cfi_createdBy` int(11) NOT NULL,
  `cfi_modifiedDate` datetime NOT NULL,
  `cfi_modifiedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbdashboardview`
--

CREATE TABLE `tblmvbdashboardview` (
  `dbv_id_pk` int(11) NOT NULL,
  `dbv_branchId_fk` int(11) NOT NULL,
  `dbv_dshboardViewTypeId_fk` int(11) NOT NULL,
  `dbv_position` int(11) NOT NULL,
  `dbv_createdDate` datetime NOT NULL,
  `dbv_createdBy` int(11) NOT NULL,
  `dbv_modifiedDate` datetime NOT NULL,
  `dbv_modifiedBy` int(11) NOT NULL,
  `dbv_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbdashboardviewtype`
--

CREATE TABLE `tblmvbdashboardviewtype` (
  `dbvt_id_pk` int(11) NOT NULL,
  `dbvt_title` varchar(100) NOT NULL,
  `dbvt_uniqueId` int(11) NOT NULL,
  `dbvt_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbdatatype`
--

CREATE TABLE `tblmvbdatatype` (
  `dat_id_pk` int(11) NOT NULL,
  `dat_name` int(45) NOT NULL,
  `dat_type` varchar(45) NOT NULL,
  `dat_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbemailtemplate`
--

CREATE TABLE `tblmvbemailtemplate` (
  `email_id_pk` int(11) NOT NULL,
  `email_festId_fk` int(11) NOT NULL,
  `email_templateName` text NOT NULL,
  `email_description` text NOT NULL,
  `email_createdBy` int(11) NOT NULL,
  `email_createdDate` datetime NOT NULL,
  `email_modifiedBy` int(11) NOT NULL,
  `email_modifiedDate` datetime NOT NULL,
  `email_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbemailtemplate`
--

INSERT INTO `tblmvbemailtemplate` (`email_id_pk`, `email_festId_fk`, `email_templateName`, `email_description`, `email_createdBy`, `email_createdDate`, `email_modifiedBy`, `email_modifiedDate`, `email_status`) VALUES
(1, 1, 'sdsadadass', '<p><b><font face="Impact">asdsadsadsadaasdsadssadsadsadsadsadsadsad</font></b></p>', 1, '2016-12-21 02:23:13', 1, '2016-12-21 02:23:13', 1),
(2, 2, 'Template 2', '<p><b style="background-color: rgb(123, 57, 0);">MNF,DMSM DSM,DS,M M,X ,MCX BCXKJV DV,CS VBKJ HCX CX M ds,,mdsnfdsjkfsdF<br></b></p><p><b style="background-color: rgb(123, 57, 0);">SDFSKFDSMFKDSFSF</b></p><p><b style="background-color: rgb(123, 57, 0);">SDFDSKNFSDKFNSDKFS</b></p><p><b style="background-color: rgb(123, 57, 0);">SD,MFSDNFMSDNMDS</b></p><p><b style="background-color: rgb(123, 57, 0);">DS,FDSNDSNFSDFMNSDFNDSF</b></p><p><b style="background-color: rgb(123, 57, 0);">SDMF</b></p>', 1, '2016-12-21 02:38:14', 1, '2016-12-21 02:38:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbfaqmanagement`
--

CREATE TABLE `tblmvbfaqmanagement` (
  `faq_id_pk` int(11) NOT NULL,
  `faq_question` text NOT NULL,
  `faq_description` text NOT NULL,
  `faq_createdDate` datetime NOT NULL,
  `faq_createdBy` int(11) NOT NULL,
  `faq_modifiedDate` datetime NOT NULL,
  `faq_modifiedBy` int(11) NOT NULL,
  `faq_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbfaqmanagement`
--

INSERT INTO `tblmvbfaqmanagement` (`faq_id_pk`, `faq_question`, `faq_description`, `faq_createdDate`, `faq_createdBy`, `faq_modifiedDate`, `faq_modifiedBy`, `faq_status`) VALUES
(1, 'Demo One', '<p style="margin-top: 30px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; text-align: start;"><span style="background-color: rgb(255, 0, 0);">Going to an investor’s office is a little overwhelming – like going to a fancy five-star hotel when you normally spend your time at tea stalls for your daily fix.</span></p><p style="margin-top: 30px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; text-align: start;">I was in one such office at the beginning of 2015 to meet an investor and bumped into one of the partners. He asked me how I was, politely chatted for a bit and then asked, “Did you raise any money? Angel funding?” I said I hadn’t (<span data-primary-role="COMPANY" data-domain="yourstory.com" class="profiles_highlight" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; background: rgba(232, 146, 151, 0.247059); border-radius: 3px; cursor: pointer;">YourStory</span>&nbsp;was bootstrapped at that point of time). And then he laughed – rather dismissively. “You know so many people in the ecosystem and you still haven’t managed to get any money?”</p><div id="banner_inside_article" class="phn-tab-hide mb-20 mt-20" style="margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; margin-top: 20px !important; margin-bottom: 20px !important;"><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; background: transparent;"></p><div id="YS-AP-ZONE4-300X250-SLOT-IN-0" data-google-query-id="CPu5xqXf8NACFY2paAodZ5IMVw" style="margin: 0px auto; padding: 0px; border: 0px; outline: 0px; background: transparent; height: 250px; width: 300px;"><div id="google_ads_iframe_/102423847/YS-AP-ZONE4-300X250_0__container__" style="margin: 0px; padding: 0px; border: 0pt none; outline: 0px; background: transparent; display: inline-block; width: 300px; height: 250px;"><iframe frameborder="0" src="https://tpc.googlesyndication.com/safeframe/1-0-5/html/container.html#xpc=sf-gdn-exp-2&amp;p=https%3A//yourstory.com" id="google_ads_iframe_/102423847/YS-AP-ZONE4-300X250_0" title="3rd party ad content" name="1-0-5;36422;<!doctype html><html><head><script>var google_casm=[&quot;&quot;,0,null,0];</script></head><body leftMargin=&quot;0&quot; topMargin=&quot;0&quot; marginwidth=&quot;0&quot; marginheight=&quot;0&quot;><script>(function(){var g=this,l=function(a,b){var c=a.split(&quot;.&quot;),d=g;c[0]in d||!d.execScript||d.execScript(&quot;var &quot;+c[0]);for(var e;c.length&amp;&amp;(e=c.shift());)c.length||void 0===b?d=d[e]?d[e]:d[e]={}:d[e]=b},m=function(a,b,c){return a.call.apply(a.bind,arguments)},n=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},p=function(a,b,c){p=Function.prototype.bind&amp;&amp;-1!=Function.prototype.bind.toString().indexOf(&quot;native code&quot;)?m:n;return p.apply(null,arguments)},q=Date.now||function(){return+new Date};var r=document,s=window;var t=function(a,b){for(var c in a)Object.prototype.hasOwnProperty.call(a,c)&amp;&amp;b.call(null,a[c],c,a)},w=function(a,b){a.google_image_requests||(a.google_image_requests=[]);var c=a.document.createElement(&quot;img&quot;);c.src=b;a.google_image_requests.push(c)};var x=function(a){return{visible:1,hidden:2,prerender:3,preview:4}[a.webkitVisibilityState||a.mozVisibilityState||a.visibilityState||&quot;&quot;]||0},y=function(a){var b;a.mozVisibilityState?b=&quot;mozvisibilitychange&quot;:a.webkitVisibilityState?b=&quot;webkitvisibilitychange&quot;:a.visibilityState&amp;&amp;(b=&quot;visibilitychange&quot;);return b};var C=function(){this.g=r;this.k=s;this.j=!1;this.i=null;this.h=[];this.o={};if(z)this.i=q();else if(3==x(this.g)){this.i=q();var a=p(this.q,this);A&amp;&amp;(a=A(&quot;di::vch&quot;,a));this.p=a;var b=this.g,c=y(this.g);b.addEventListener?b.addEventListener(c,a,!1):b.attachEvent&amp;&amp;b.attachEvent(&quot;on&quot;+c,a)}else B(this)},A;C.m=function(){return C.n?C.n:C.n=new C};var D=/^([^:]+:\\/\\/[^/]+)/m,G=/^\\d*,(.+)$/m,z=!1,B=function(a){if(!a.j){a.j=!0;for(var b=0;b<a.h.length;++b)a.l.apply(a,a.h[b]);a.h=[]}};C.prototype.s=function(a,b){var c=b.target.u();(c=G.exec(c))&amp;&amp;(this.o[a]=c[1])};C.prototype.l=function(a,b){this.k.rvdt=this.i?q()-this.i:0;var c;if(c=this.t)t:{try{var d=D.exec(this.k.location.href),e=D.exec(a);if(d&amp;&amp;e&amp;&amp;d[1]==e[1]&amp;&amp;b){var f=p(this.s,this,b);this.t(a,f);c=!0;break t}}catch(u){}c=!1}c||w(this.k,a)};C.prototype.q=function(){if(3!=x(this.g)){B(this);var a=this.g,b=y(this.g),c=this.p;a.removeEventListener?a.removeEventListener(b,c,!1):a.detachEvent&amp;&amp;a.detachEvent(&quot;on&quot;+b,c)}};var H=/^true$/.test(&quot;&quot;)?!0:!1;var I={},J=function(a){var b=a.toString();a.name&amp;&amp;-1==b.indexOf(a.name)&amp;&amp;(b+=&quot;: &quot;+a.name);a.message&amp;&amp;-1==b.indexOf(a.message)&amp;&amp;(b+=&quot;: &quot;+a.message);if(a.stack){a=a.stack;var c=b;try{-1==a.indexOf(c)&amp;&amp;(a=c+&quot;\\n&quot;+a);for(var d;a!=d;)d=a,a=a.replace(/((https?:\\/..*\\/)[^\\/:]*:\\d+(?:.|\\n)*)\\2/,&quot;$1&quot;);b=a.replace(/\\n */g,&quot;\\n&quot;)}catch(e){b=c}}return b},M=function(a,b,c,d){var e=K,f,u=!0;try{f=b()}catch(h){try{var N=J(h);b=&quot;&quot;;h.fileName&amp;&amp;(b=h.fileName);var E=-1;h.lineNumber&amp;&amp;(E=h.lineNumber);var v;t:{try{v=c?c():&quot;&quot;;break t}catch(S){}v=&quot;&quot;}u=e(a,N,b,E,v)}catch(k){try{var O=J(k);a=&quot;&quot;;k.fileName&amp;&amp;(a=k.fileName);c=-1;k.lineNumber&amp;&amp;(c=k.lineNumber);K(&quot;pAR&quot;,O,a,c,void 0,void 0)}catch(F){L({context:&quot;mRE&quot;,msg:F.toString()+&quot;\\n&quot;+(F.stack||&quot;&quot;)},void 0)}}if(!u)throw h;}finally{if(d)try{d()}catch(T){}}return f},K=function(a,b,c,d,e,f){a={context:a,msg:b.substring(0,512),eid:e&amp;&amp;e.substring(0,40),file:c,line:d.toString(),url:r.URL.substring(0,512),ref:r.referrer.substring(0,512)};P(a);L(a,f);return!0},L=function(a,b){try{if(Math.random()<(b||.01)){var c=&quot;/pagead/gen_204?id=jserror&quot;+Q(a),d=&quot;http&quot;+(&quot;https:&quot;==s.location.protocol?&quot;s&quot;:&quot;&quot;)+&quot;://pagead2.googlesyndication.com&quot;+c,d=d.substring(0,2E3);w(s,d)}}catch(e){}},P=function(a){var b=a||{};t(I,function(a,d){b[d]=s[a]})},R=function(a,b,c,d,e){return function(){var f=arguments;return M(a,function(){return b.apply(c,f)},d,e)}},Q=function(a){var b=&quot;&quot;;t(a,function(a,d){if(0===a||a)b+=&quot;&amp;&quot;+d+&quot;=&quot;+(&quot;function&quot;==typeof encodeURIComponent?encodeURIComponent(a):escape(a))});return b};A=function(a,b,c,d){return R(a,b,void 0,c,d)};z=H;l(&quot;vu&quot;,R(&quot;vu&quot;,function(a,b){var c=a.replace(&quot;&amp;amp;&quot;,&quot;&amp;&quot;),d=/(google|doubleclick).*\\/pagead\\/adview/.test(c),e=C.m();if(d){d=&quot;&amp;vis=&quot;+x(e.g);b&amp;&amp;(d+=&quot;&amp;ve=1&quot;);var f=c.indexOf(&quot;&amp;adurl&quot;),c=-1==f?c+d:c.substring(0,f)+d+c.substring(f)}e.j?e.l(c,b):e.h.push([c,b])}));l(&quot;vv&quot;,R(&quot;vv&quot;,function(){z&amp;&amp;B(C.m())}));})();</script><script>vu(&quot;https://adx.g.doubleclick.net/pagead/adview?ai\\x3dCbs0zWrBPWPukIY3TogPnpLK4BdyT9JRGl8ueuIQBwI23ARABIABg5ermg7wOggEXY2EtcHViLTIzNjQxMzgzMDcwNTIzOTfIAQngAgCoAwGqBMMBT9A8XFD7t4lWmih3v6JP3AFUxBb9FuBoXRGaos48Elbb-nznNRFoM-gg4hEAWLZD5_Ntzx53SUf2IvU2CTcyartNuCY4BSVbVejAwL22iLl0CKkS9mPpluMdQqIgr9cxyzZxYUWuB_NtF45zsFhTWbjRJ9Bf_aQbh9qQDpfBAExFycshGSWOd2AU50tntkGKYpUIjtcV83zRjUeAiMynXVPEvsESO7GVVq15hXT8UH7Cszxekca2NMRMV7Exg9P2cudY4AQBgAa7_6-9sujwj90BoAYhqAemvhvYBwDSCAUIgGEQAQ\\x26sigh\\x3dmIA6G8DKfuk&quot;)</script><script language=\'JavaScript\' src=\'https://tags.mathtag.com/notify/js?exch=adx&amp;id=5aW95q2jLzExLyAvWVdKaU5qVTNabVl0TmpGa1pDMDBNekF3TFRsaU5qTXRabVUyWVRRM1lXSmpPVFF6LzExNDczNTA5MDQ1OTQzOTY1MDYvMzA1NTAyOC8xNjQzODI0LzQveVdQSml1NEFWNGsteUhvbjNrT3prUUdwWjhnTWdXODBHX0lrMUZ6anZCQS8xLzQvMTQ4MTU5NDI0OS8wLzMxMDcyOC8yMDc2ODE5NDU2LzE1NTY3OS8yNzI5OTkvMS85MDQzMzcvMC9ZV0ppTmpVM1ptWXROakZrWkMwME16QXdMVGxpTmpNdFptVTJZVFEzWVdKak9UUXovMC8wLzAv/F4sV9Na7keK-vad4m7rkPGWa-Qk&amp;sid=1643824&amp;cid=3055028&amp;nodeid=1087&amp;price=WE-wWgAIUnsKaKmNAAySZ1QFC-XS_qz92zuncg&amp;auctionid=1147350904594396506&amp;bp=c_heibei&amp;3pck=https://adclick.g.doubleclick.net/aclk%3Fsa%3DL%26ai%3DCbs0zWrBPWPukIY3TogPnpLK4BdyT9JRGl8ueuIQBwI23ARABIABg5ermg7wOggEXY2EtcHViLTIzNjQxMzgzMDcwNTIzOTfIAQngAgCoAwGqBMMBT9A8XFD7t4lWmih3v6JP3AFUxBb9FuBoXRGaos48Elbb-nznNRFoM-gg4hEAWLZD5_Ntzx53SUf2IvU2CTcyartNuCY4BSVbVejAwL22iLl0CKkS9mPpluMdQqIgr9cxyzZxYUWuB_NtF45zsFhTWbjRJ9Bf_aQbh9qQDpfBAExFycshGSWOd2AU50tntkGKYpUIjtcV83zRjUeAiMynXVPEvsESO7GVVq15hXT8UH7Cszxekca2NMRMV7Exg9P2cudY4AQBgAa7_6-9sujwj90BoAYhqAemvhvYBwDSCAUIgGEQAQ%26num%3D1%26sig%3DAOD64_0Ny8FoiB1gkadOx_0erqstCC5XwQ%26client%3Dca-pub-2364138307052397%26adurl%3D\'></script><script>(function(){var e=this,h=function(a,b,c){return a.call.apply(a.bind,arguments)},aa=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},k=function(a,b,c){k=Function.prototype.bind&amp;&amp;-1!=Function.prototype.bind.toString().indexOf(&quot;native code&quot;)?h:aa;return k.apply(null,arguments)},l=Date.now||function(){return+new Date};var m=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\\s\\xa0]+|[\\s\\xa0]+$/g,&quot;&quot;)},p=function(a,b){return a<b?-1:a>b?1:0};var q;a:{var r=e.navigator;if(r){var u=r.userAgent;if(u){q=u;break a}}q=&quot;&quot;};var v=function(a){v[&quot; &quot;](a);return a};v[&quot; &quot;]=function(){};var ca=function(a,b){var c=ba;Object.prototype.hasOwnProperty.call(c,a)||(c[a]=b(a))};var da=-1!=q.indexOf(&quot;Opera&quot;),w=-1!=q.indexOf(&quot;Trident&quot;)||-1!=q.indexOf(&quot;MSIE&quot;),ea=-1!=q.indexOf(&quot;Edge&quot;),x=-1!=q.indexOf(&quot;Gecko&quot;)&amp;&amp;!(-1!=q.toLowerCase().indexOf(&quot;webkit&quot;)&amp;&amp;-1==q.indexOf(&quot;Edge&quot;))&amp;&amp;!(-1!=q.indexOf(&quot;Trident&quot;)||-1!=q.indexOf(&quot;MSIE&quot;))&amp;&amp;-1==q.indexOf(&quot;Edge&quot;),fa=-1!=q.toLowerCase().indexOf(&quot;webkit&quot;)&amp;&amp;-1==q.indexOf(&quot;Edge&quot;),y=function(){var a=e.document;return a?a.documentMode:void 0},z;a:{var A=&quot;&quot;,B=function(){var a=q;if(x)return/rv\\:([^\\);]+)(\\)|;)/.exec(a);if(ea)return/Edge\\/([\\d\\.]+)/.exec(a);if(w)return/\\b(?:MSIE|rv)[: ]([^\\);]+)(\\)|;)/.exec(a);if(fa)return/WebKit\\/(\\S+)/.exec(a);if(da)return/(?:Version)[ \\/]?(\\S+)/.exec(a)}();B&amp;&amp;(A=B?B[1]:&quot;&quot;);if(w){var C=y();if(null!=C&amp;&amp;C>parseFloat(A)){z=String(C);break a}}z=A}var D=z,ba={},E=function(a){ca(a,function(){for(var b=0,c=m(String(D)).split(&quot;.&quot;),d=m(String(a)).split(&quot;.&quot;),t=Math.max(c.length,d.length),n=0;0==b&amp;&amp;n<t;n++){var f=c[n]||&quot;&quot;,g=d[n]||&quot;&quot;;do{f=/(\\d*)(\\D*)(.*)/.exec(f)||[&quot;&quot;,&quot;&quot;,&quot;&quot;,&quot;&quot;];g=/(\\d*)(\\D*)(.*)/.exec(g)||[&quot;&quot;,&quot;&quot;,&quot;&quot;,&quot;&quot;];if(0==f[0].length&amp;&amp;0==g[0].length)break;b=p(0==f[1].length?0:parseInt(f[1],10),0==g[1].length?0:parseInt(g[1],10))||p(0==f[2].length,0==g[2].length)||p(f[2],g[2]);f=f[3];g=g[3]}while(0==b)}return 0<=b})},F;var G=e.document;F=G&amp;&amp;w?y()||(&quot;CSS1Compat&quot;==G.compatMode?parseInt(D,10):5):void 0;var H;if(!(H=!x&amp;&amp;!w)){var I;if(I=w)I=9<=Number(F);H=I}H||x&amp;&amp;E(&quot;1.9.1&quot;);w&amp;&amp;E(&quot;9&quot;);var ga=function(){var a=!1;try{var b=Object.defineProperty({},&quot;passive&quot;,{get:function(){a=!0}});window.addEventListener(&quot;test&quot;,null,b)}catch(c){}return a}(),J=function(a,b,c){a.addEventListener?a.addEventListener(b,c,ga?void 0:!1):a.attachEvent&amp;&amp;a.attachEvent(&quot;on&quot;+b,c)};var K=function(){ha()},ha=e.performance&amp;&amp;e.performance.now?k(e.performance.now,e.performance):l;K.prototype.install=function(a){a=a||window;a.google_js_reporting_queue=a.google_js_reporting_queue||[]};var L=/^(?:([^:/?#.]+):)?(?:\\/\\/(?:([^/?#]*)@)?([^/#?]*?)(?::([0-9]+))?(?=[/#?]|$))?([^?#]+)?(?:\\?([^#]*))?(?:#([\\s\\S]*))?$/,M=function(a){return a?decodeURI(a):a};var O=function(){var a=N;try{var b;if(b=!!a&amp;&amp;null!=a.location.href)a:{try{v(a.foo);b=!0;break a}catch(c){}b=!1}return b}catch(c){return!1}};var P=document,Q=window;var R=!!window.google_async_iframe_id,N=R&amp;&amp;window.parent||window;(new K).install(function(){if(R&amp;&amp;!O()){var a=&quot;.&quot;+P.domain;try{for(;2<a.split(&quot;.&quot;).length&amp;&amp;!O();)P.domain=a=a.substr(a.indexOf(&quot;.&quot;)+1),N=window.parent}catch(b){}O()||(N=window)}return N}());var U=function(a,b,c,d,t,n,f,g,ia){S(P.hidden)?(this.h=&quot;hidden&quot;,this.j=&quot;visibilitychange&quot;):S(P.mozHidden)?(this.h=&quot;mozHidden&quot;,this.j=&quot;mozvisibilitychange&quot;):S(P.msHidden)?(this.h=&quot;msHidden&quot;,this.j=&quot;msvisibilitychange&quot;):S(P.webkitHidden)&amp;&amp;(this.h=&quot;webkitHidden&quot;,this.j=&quot;webkitvisibilitychange&quot;);this.o=!1;this.g=a;this.i=-1;this.s=b;this.u=c;this.I=d;this.F=n;this.A=f?&quot;mousedown&quot;:&quot;click&quot;;t&amp;&amp;P[this.h]&amp;&amp;T(this,2);this.G=g;this.D=ia||0;this.v=this.B=this.l=this.w=null;a=k(this.H,this);J(P,this.j,a);ka(this)};U.prototype.H=function(){if(P[this.h])this.o&amp;&amp;(this.C(),this.i=l(),T(this,0));else{if(-1!=this.i){var a=l()-this.i;a>this.D&amp;&amp;(this.i=-1,T(this,1,a),null!==this.g&amp;&amp;(this.g.registerFinalizeCallback(k(this.g.fireOnObject,this.g,&quot;attempt_survey_trigger&quot;,[&quot;wfocus&quot;,this.u,this.s,this.l,this.B,this.v,a])),5E3<a&amp;&amp;this.g.fireOnObject(&quot;should_show_thank_you&quot;,{})))}this.F&amp;&amp;T(this,3)}};var ka=function(a){if(null!==a.g){var b=k(function(a,b,c){this.l=b.L().K();this.l||(a=b.J(),this.l=&quot;&quot;+M(a.match(L)[3]||null)+M(a.match(L)[5]||null));this.B=b.creativeConversionUrl();this.v=b.adGroupCreativeId();this.m(c)},a),c=a.A;a.g.forEachAd(function(a){a.forEachNavigationAdPiece(function(d){a.listen(d,c,b)})})}else{var d=k(a.m,a);J(Q,a.A,d)}};U.prototype.m=function(a){this.w=a.button;this.o=!0;a=k(this.C,this);Q.setTimeout(a,5E3)};U.prototype.handleClick=U.prototype.m;U.prototype.C=function(){this.o=!1};var T=function(a,b,c){var d=[&quot;//&quot;,a.I?&quot;googleads.g.doubleclick.net&quot;:&quot;pagead2.googlesyndication.com&quot;,&quot;/pagead/gen_204?id=wfocus&quot;,&quot;&amp;gqid=&quot;+a.s,&quot;&amp;qqid=&quot;+a.u].join(&quot;&quot;);0==b&amp;&amp;(d+=&quot;&amp;return=0&quot;);1==b&amp;&amp;(d+=&quot;&amp;return=1&amp;timeDelta=&quot;+c,a.G&amp;&amp;(d+=&quot;&amp;cbtn=&quot;+a.w));2==b&amp;&amp;(d+=&quot;&amp;bgload=1&quot;);3==b&amp;&amp;(d+=&quot;&amp;fg=1&quot;);Q.google_image_requests||(Q.google_image_requests=[]);a=Q.document.createElement(&quot;img&quot;);a.src=d;Q.google_image_requests.push(a)},S=function(a){return&quot;undefined&quot;!==typeof a};var V=function(a,b,c,d,t,n,f,g){return new U(null,a,b,c,d,t,n,f,g)},W=[&quot;wfocusnhinit&quot;],X=e;W[0]in X||!X.execScript||X.execScript(&quot;var &quot;+W[0]);for(var Y;W.length&amp;&amp;(Y=W.shift());){var Z;if(Z=!W.length)Z=void 0!==V;Z?X[Y]=V:X[Y]?X=X[Y]:X=X[Y]={}};}).call(this);window[\'window_focus_for_click\'] =wfocusnhinit(&quot;WrBPWKfLINGrogPb6a_QCw&quot;,&quot;CPu5xqXf8NACFY2paAodZ5IMVw&quot;,true,true,true,false,false,0);</script><iframe scrolling=&quot;no&quot; frameborder=0 height=0 width=0 src=&quot;https://cm.g.doubleclick.net/push?client=ca-pub-2364138307052397&quot; style=&quot;position:absolute&quot;></iframe><script type=&quot;text/javascript&quot;>(function(){var h=this,aa=function(){},ba=function(a){var b=typeof a;if(&quot;object&quot;==b)if(a){if(a instanceof Array)return&quot;array&quot;;if(a instanceof Object)return b;var c=Object.prototype.toString.call(a);if(&quot;[object Window]&quot;==c)return&quot;object&quot;;if(&quot;[object Array]&quot;==c||&quot;number&quot;==typeof a.length&amp;&amp;&quot;undefined&quot;!=typeof a.splice&amp;&amp;&quot;undefined&quot;!=typeof a.propertyIsEnumerable&amp;&amp;!a.propertyIsEnumerable(&quot;splice&quot;))return&quot;array&quot;;if(&quot;[object Function]&quot;==c||&quot;undefined&quot;!=typeof a.call&amp;&amp;&quot;undefined&quot;!=typeof a.propertyIsEnumerable&amp;&amp;!a.propertyIsEnumerable(&quot;call&quot;))return&quot;function&quot;}else return&quot;null&quot;;else if(&quot;function&quot;==b&amp;&amp;&quot;undefined&quot;==typeof a.call)return&quot;object&quot;;return b},l=function(a){return&quot;string&quot;==typeof a},ca=function(a,b,c){return a.call.apply(a.bind,arguments)},da=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},q=function(a,b,c){q=Function.prototype.bind&amp;&amp;-1!=Function.prototype.bind.toString().indexOf(&quot;native code&quot;)?ca:da;return q.apply(null,arguments)},ea=function(a,b){var c=Array.prototype.slice.call(arguments,1);return function(){var b=c.slice();b.push.apply(b,arguments);return a.apply(this,b)}},r=Date.now||function(){return+new Date},t=function(a,b){a=a.split(&quot;.&quot;);var c=h;a[0]in c||!c.execScript||c.execScript(&quot;var &quot;+a[0]);for(var d;a.length&amp;&amp;(d=a.shift());)a.length||void 0===b?c=c[d]?c[d]:c[d]={}:c[d]=b};var fa=function(a,b,c,d,e){if(e)c=a+(&quot;&amp;&quot;+b+&quot;=&quot;+c);else{var f=&quot;&amp;&quot;+b+&quot;=&quot;,g=a.indexOf(f);0>g?c=a+f+c:(g+=f.length,f=a.indexOf(&quot;&amp;&quot;,g),c=0<=f?a.substring(0,g)+c+a.substring(f):a.substring(0,g)+c)}return 2E3<c.length?void 0!==d?fa(a,b,d,void 0,e):a:c};var ga=function(){var a=/[&amp;\\?#]exk=([^&amp; ]+)/.exec(u.location.href);return a&amp;&amp;2==a.length?a[1]:null};var ha=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\\s\\xa0]+|[\\s\\xa0]+$/g,&quot;&quot;)},ja=function(a,b){var c=0;a=ha(String(a)).split(&quot;.&quot;);b=ha(String(b)).split(&quot;.&quot;);for(var d=Math.max(a.length,b.length),e=0;0==c&amp;&amp;e<d;e++){var f=a[e]||&quot;&quot;,g=b[e]||&quot;&quot;;do{f=/(\\d*)(\\D*)(.*)/.exec(f)||[&quot;&quot;,&quot;&quot;,&quot;&quot;,&quot;&quot;];g=/(\\d*)(\\D*)(.*)/.exec(g)||[&quot;&quot;,&quot;&quot;,&quot;&quot;,&quot;&quot;];if(0==f[0].length&amp;&amp;0==g[0].length)break;c=ia(0==f[1].length?0:parseInt(f[1],10),0==g[1].length?0:parseInt(g[1],10))||ia(0==f[2].length,0==g[2].length)||ia(f[2],g[2]);f=f[3];g=g[3]}while(0==c)}return c},ia=function(a,b){return a<b?-1:a>b?1:0};var ka=Array.prototype.indexOf?function(a,b,c){return Array.prototype.indexOf.call(a,b,c)}:function(a,b,c){c=null==c?0:0>c?Math.max(0,a.length+c):c;if(l(a))return l(b)&amp;&amp;1==b.length?a.indexOf(b,c):-1;for(;c<a.length;c++)if(c in a&amp;&amp;a[c]===b)return c;return-1},la=Array.prototype.forEach?function(a,b,c){Array.prototype.forEach.call(a,b,c)}:function(a,b,c){for(var d=a.length,e=l(a)?a.split(&quot;&quot;):a,f=0;f<d;f++)f in e&amp;&amp;b.call(c,e[f],f,a)},ma=Array.prototype.map?function(a,b,c){return Array.prototype.map.call(a,b,c)}:function(a,b,c){for(var d=a.length,e=Array(d),f=l(a)?a.split(&quot;&quot;):a,g=0;g<d;g++)g in f&amp;&amp;(e[g]=b.call(c,f[g],g,a));return e};var na=function(a,b,c){this.label=a;this.type=4;this.eventId=b;this.value=c};var pa=function(a){this.A=oa();this.enabled=Math.random()<a;this.i=[];this.o={}},oa=h.performance&amp;&amp;h.performance.now?q(h.performance.now,h.performance):r;pa.prototype.install=function(a){a=a||window;a.google_js_reporting_queue=a.google_js_reporting_queue||[];this.i=a.google_js_reporting_queue};pa.prototype.disable=function(){this.i.length=0;this.enabled=!1};var qa=function(a,b,c){var d=oa();c=c();d=oa()-a.A-(d-a.A);if(a.enabled){var e=a.o[b]||0,f=e+1;f>e&amp;&amp;(a.o[b]=f);a.i.push(new na(b,f,d))}return c},sa=function(a,b){return q(function(){for(var c=[],d=0;d<arguments.length;++d)c[d]=arguments[d];return qa(this,a,function(){return b.apply(void 0,c)})},ra)};var ta=function(a,b,c){if(&quot;array&quot;==ba(b))for(var d=0;d<b.length;d++)ta(a,String(b[d]),c);else null!=b&amp;&amp;c.push(&quot;&amp;&quot;,a,&quot;&quot;===b?&quot;&quot;:&quot;=&quot;,encodeURIComponent(String(b)))},ua=function(a,b,c){for(c=c||0;c<b.length;c+=2)ta(b[c],b[c+1],a);return a},ya=function(a,b){var c=2==arguments.length?ua([a],arguments[1],0):ua([a],arguments,1);if(c[1]){var d=c[0],e=d.indexOf(&quot;#&quot;);0<=e&amp;&amp;(c.push(d.substr(e)),c[0]=d=d.substr(0,e));e=d.indexOf(&quot;?&quot;);0>e?c[1]=&quot;?&quot;:e==d.length-1&amp;&amp;(c[1]=void 0)}return c.join(&quot;&quot;)};var za=function(a){za[&quot; &quot;](a);return a};za[&quot; &quot;]=aa;var Ba=function(a,b){var c=Aa;return Object.prototype.hasOwnProperty.call(c,a)?c[a]:c[a]=b(a)};var v=function(a){try{var b;if(b=!!a&amp;&amp;null!=a.location.href)a:{try{za(a.foo);b=!0;break a}catch(c){}b=!1}return b}catch(c){return!1}},Ca=function(a,b){for(var c in a)Object.prototype.hasOwnProperty.call(a,c)&amp;&amp;b.call(void 0,a[c],c,a)},Ea=function(){var a=Da;if(!a)return&quot;&quot;;var b=/.*[&amp;#?]google_debug(=[^&amp;]*)?(&amp;.*)?$/;try{var c=b.exec(decodeURIComponent(a));if(c)return c[1]&amp;&amp;1<c[1].length?c[1].substring(1):&quot;true&quot;}catch(d){}return&quot;&quot;};var Fa=function(a,b){this.B=a;this.C=b},Ga=function(a,b){this.url=a;this.s=!!b;this.depth=null};var Ha=function(){var a=!1;try{var b=Object.defineProperty({},&quot;passive&quot;,{get:function(){a=!0}});window.addEventListener(&quot;test&quot;,null,b)}catch(c){}return a}(),Ia=function(a,b,c,d){a.addEventListener?a.addEventListener(b,c,Ha?d:&quot;boolean&quot;==typeof d?d:d?d.capture||!1:!1):a.attachEvent&amp;&amp;a.attachEvent(&quot;on&quot;+b,c)},Ja=function(a,b,c){a.removeEventListener?a.removeEventListener(b,c,Ha?void 0:!1):a.detachEvent&amp;&amp;a.detachEvent(&quot;on&quot;+b,c)};var Ka=function(a,b,c,d,e){this.u=c||4E3;this.g=a||&quot;&amp;&quot;;this.L=b||&quot;,$&quot;;this.h=void 0!==d?d:&quot;trn&quot;;this.V=e||null;this.m=!1;this.f={};this.R=0;this.c=[]},La=function(a,b){var c={};c[a]=b;return[c]},w=function(a,b,c,d){a.c.push(b);a.f[b]=La(c,d)},Oa=function(a,b,c,d){b=b+&quot;//&quot;+c+d;var e=Ma(a)-d.length-0;if(0>e)return&quot;&quot;;a.c.sort(function(a,b){return a-b});d=null;c=&quot;&quot;;for(var f=0;f<a.c.length;f++)for(var g=a.c[f],k=a.f[g],m=0;m<k.length;m++){if(!e){d=null==d?g:d;break}var p=Na(k[m],a.g,a.L);if(p){p=c+p;if(e>=p.length){e-=p.length;b+=p;c=a.g;break}else a.m&amp;&amp;(c=e,p[c-1]==a.g&amp;&amp;--c,b+=p.substr(0,c),c=a.g,e=0);d=null==d?g:d}}f=&quot;&quot;;a.h&amp;&amp;null!=d&amp;&amp;(f=c+a.h+&quot;=&quot;+(a.V||d));return b+f+&quot;&quot;},Ma=function(a){if(!a.h)return a.u;var b=1,c;for(c in a.f)b=c.length>b?c.length:b;return a.u-a.h.length-b-a.g.length-1},Na=function(a,b,c,d,e){var f=[];Ca(a,function(a,k){(a=Pa(a,b,c,d,e))&amp;&amp;f.push(k+&quot;=&quot;+a)});return f.join(b)},Pa=function(a,b,c,d,e){if(null==a)return&quot;&quot;;b=b||&quot;&amp;&quot;;c=c||&quot;,$&quot;;&quot;string&quot;==typeof c&amp;&amp;(c=c.split(&quot;&quot;));if(a instanceof Array){if(d=d||0,d<c.length){for(var f=[],g=0;g<a.length;g++)f.push(Pa(a[g],b,c,d+1,e));return f.join(c[d])}}else if(&quot;object&quot;==typeof a)return e=e||0,2>e?encodeURIComponent(Na(a,b,c,d,e+1)):&quot;...&quot;;return encodeURIComponent(String(a))};var Ra=function(a,b,c,d,e){if((d?a.U:Math.random())<(e||a.M))try{var f;c instanceof Ka?f=c:(f=new Ka,Ca(c,function(a,b){var c=f,d=c.R++;a=La(b,a);c.c.push(d);c.f[d]=a}));var g=Oa(f,a.T,a.N,a.S+b+&quot;&amp;&quot;);g&amp;&amp;Qa(h,g)}catch(k){}},Qa=function(a,b,c){a.google_image_requests||(a.google_image_requests=[]);var d=a.document.createElement(&quot;img&quot;);if(c){var e=function(a){c(a);Ja(d,&quot;load&quot;,e);Ja(d,&quot;error&quot;,e)};Ia(d,&quot;load&quot;,e);Ia(d,&quot;error&quot;,e)}d.src=b;a.google_image_requests.push(d)};var Sa=function(a,b,c){this.w=a;this.P=b;this.j=c;this.l=null;this.O=this.v;this.D=!1},Ta=function(a,b,c){this.message=a;this.fileName=b||&quot;&quot;;this.lineNumber=c||-1},Va=function(a,b,c){var d;try{d=c()}catch(g){var e=a.j;try{var f=Ua(g),e=a.O.call(a,b,f,void 0,void 0)}catch(k){a.v(&quot;pAR&quot;,k)}if(!e)throw g;}finally{}return d},Wa=function(a,b,c){return function(){for(var d=[],e=0;e<arguments.length;++e)d[e]=arguments[e];return Va(a,b,function(){return c.apply(void 0,d)})}};Sa.prototype.v=function(a,b,c,d,e){try{var f=e||this.P,g=new Ka;g.m=!0;w(g,1,&quot;context&quot;,a);b instanceof Ta||(b=Ua(b));w(g,2,&quot;msg&quot;,b.message.substring(0,512));b.fileName&amp;&amp;w(g,3,&quot;file&quot;,b.fileName);0<b.lineNumber&amp;&amp;w(g,4,&quot;line&quot;,b.lineNumber.toString());b={};if(this.l)try{this.l(b)}catch(X){}if(d)try{d(b)}catch(X){}d=[b];g.c.push(5);g.f[5]=d;var k;e=h;d=[];var m,p=null;do{b=e;v(b)?(m=b.location.href,p=b.document&amp;&amp;b.document.referrer||null):(m=p,p=null);d.push(new Ga(m||&quot;&quot;));try{e=b.parent}catch(X){e=null}}while(e&amp;&amp;b!=e);m=0;for(var n=d.length-1;m<=n;++m)d[m].depth=n-m;b=h;if(b.location&amp;&amp;b.location.ancestorOrigins&amp;&amp;b.location.ancestorOrigins.length==d.length-1)for(m=1;m<d.length;++m){var va=d[m];va.url||(va.url=b.location.ancestorOrigins[m-1]||&quot;&quot;,va.s=!0)}for(var wa=new Ga(h.location.href,!1),xa=d.length-1,n=xa;0<=n;--n){var G=d[n];if(G.url&amp;&amp;!G.s){wa=G;break}}var G=null,kc=d.length&amp;&amp;d[xa].url;0!=wa.depth&amp;&amp;kc&amp;&amp;(G=d[xa]);k=new Fa(wa,G);k.C&amp;&amp;w(g,6,&quot;top&quot;,k.C.url||&quot;&quot;);w(g,7,&quot;url&quot;,k.B.url||&quot;&quot;);Ra(this.w,f,g,this.D,c)}catch(X){try{Ra(this.w,f,{context:&quot;ecmserr&quot;,rctx:a,msg:Xa(X),url:k.B.url},this.D,c)}catch(Sc){}}return this.j};var Ua=function(a){return new Ta(Xa(a),a.fileName,a.lineNumber)},Xa=function(a){var b=a.toString();a.name&amp;&amp;-1==b.indexOf(a.name)&amp;&amp;(b+=&quot;: &quot;+a.name);a.message&amp;&amp;-1==b.indexOf(a.message)&amp;&amp;(b+=&quot;: &quot;+a.message);if(a.stack){a=a.stack;var c=b;try{-1==a.indexOf(c)&amp;&amp;(a=c+&quot;\\n&quot;+a);for(var d;a!=d;)d=a,a=a.replace(/((https?:\\/..*\\/)[^\\/:]*:\\d+(?:.|\\n)*)\\2/,&quot;$1&quot;);b=a.replace(/\\n */g,&quot;\\n&quot;)}catch(e){b=c}}return b};var Ya=function(a,b){for(var c in a)b.call(void 0,a[c],c,a)},Za=function(a,b){return null!==a&amp;&amp;b in a};var x;a:{var $a=h.navigator;if($a){var ab=$a.userAgent;if(ab){x=ab;break a}}x=&quot;&quot;}var y=function(a){return-1!=x.indexOf(a)},bb=function(a){for(var b=/(\\w[\\w ]+)\\/([^\\s]+)\\s*(?:\\((.*?)\\))?/g,c=[],d;d=b.exec(a);)c.push([d[1],d[2],d[3]||void 0]);return c};var cb=function(){return y(&quot;Trident&quot;)||y(&quot;MSIE&quot;)},z=function(){return(y(&quot;Chrome&quot;)||y(&quot;CriOS&quot;))&amp;&amp;!y(&quot;Edge&quot;)},eb=function(){function a(a){var b;a:{b=d;for(var e=a.length,k=l(a)?a.split(&quot;&quot;):a,m=0;m<e;m++)if(m in k&amp;&amp;b.call(void 0,k[m],m,a)){b=m;break a}b=-1}return c[0>b?null:l(a)?a.charAt(b):a[b]]||&quot;&quot;}var b=x;if(cb())return db(b);var b=bb(b),c={};la(b,function(a){c[a[0]]=a[1]});var d=ea(Za,c);return y(&quot;Opera&quot;)?a([&quot;Version&quot;,&quot;Opera&quot;]):y(&quot;Edge&quot;)?a([&quot;Edge&quot;]):z()?a([&quot;Chrome&quot;,&quot;CriOS&quot;]):(b=b[2])&amp;&amp;b[1]||&quot;&quot;},db=function(a){var b=/rv: *([\\d\\.]*)/.exec(a);if(b&amp;&amp;b[1])return b[1];var b=&quot;&quot;,c=/MSIE +([\\d\\.]+)/.exec(a);if(c&amp;&amp;c[1])if(a=/Trident\\/(\\d.\\d)/.exec(a),&quot;7.0&quot;==c[1])if(a&amp;&amp;a[1])switch(a[1]){case &quot;4.0&quot;:b=&quot;8.0&quot;;break;case &quot;5.0&quot;:b=&quot;9.0&quot;;break;case &quot;6.0&quot;:b=&quot;10.0&quot;;break;case &quot;7.0&quot;:b=&quot;11.0&quot;}else b=&quot;7.0&quot;;else b=c[1];return b};var A=function(){return y(&quot;iPhone&quot;)&amp;&amp;!y(&quot;iPod&quot;)&amp;&amp;!y(&quot;iPad&quot;)};var fb=y(&quot;Opera&quot;),B=cb(),gb=y(&quot;Edge&quot;),C=y(&quot;Gecko&quot;)&amp;&amp;!(-1!=x.toLowerCase().indexOf(&quot;webkit&quot;)&amp;&amp;!y(&quot;Edge&quot;))&amp;&amp;!(y(&quot;Trident&quot;)||y(&quot;MSIE&quot;))&amp;&amp;!y(&quot;Edge&quot;),hb=-1!=x.toLowerCase().indexOf(&quot;webkit&quot;)&amp;&amp;!y(&quot;Edge&quot;),ib=y(&quot;Macintosh&quot;),jb=y(&quot;Windows&quot;),kb=y(&quot;Android&quot;),lb=A(),mb=y(&quot;iPad&quot;),nb=y(&quot;iPod&quot;),ob=function(){var a=h.document;return a?a.documentMode:void 0},pb;a:{var qb=&quot;&quot;,rb=function(){var a=x;if(C)return/rv\\:([^\\);]+)(\\)|;)/.exec(a);if(gb)return/Edge\\/([\\d\\.]+)/.exec(a);if(B)return/\\b(?:MSIE|rv)[: ]([^\\);]+)(\\)|;)/.exec(a);if(hb)return/WebKit\\/(\\S+)/.exec(a);if(fb)return/(?:Version)[ \\/]?(\\S+)/.exec(a)}();rb&amp;&amp;(qb=rb?rb[1]:&quot;&quot;);if(B){var sb=ob();if(null!=sb&amp;&amp;sb>parseFloat(qb)){pb=String(sb);break a}}pb=qb}var tb=pb,Aa={},D=function(a){return Ba(a,function(){return 0<=ja(tb,a)})},ub;var vb=h.document;ub=vb&amp;&amp;B?ob()||(&quot;CSS1Compat&quot;==vb.compatMode?parseInt(tb,10):5):void 0;var wb=y(&quot;Firefox&quot;),xb=A()||y(&quot;iPod&quot;),yb=y(&quot;iPad&quot;),zb=y(&quot;Android&quot;)&amp;&amp;!(z()||y(&quot;Firefox&quot;)||y(&quot;Opera&quot;)||y(&quot;Silk&quot;)),Ab=z(),Bb=y(&quot;Safari&quot;)&amp;&amp;!(z()||y(&quot;Coast&quot;)||y(&quot;Opera&quot;)||y(&quot;Edge&quot;)||y(&quot;Silk&quot;)||y(&quot;Android&quot;))&amp;&amp;!(A()||y(&quot;iPad&quot;)||y(&quot;iPod&quot;));var E=function(a,b){this.width=a;this.height=b};E.prototype.clone=function(){return new E(this.width,this.height)};E.prototype.ceil=function(){this.width=Math.ceil(this.width);this.height=Math.ceil(this.height);return this};E.prototype.floor=function(){this.width=Math.floor(this.width);this.height=Math.floor(this.height);return this};E.prototype.round=function(){this.width=Math.round(this.width);this.height=Math.round(this.height);return this};E.prototype.scale=function(a,b){this.width*=a;this.height*=&quot;number&quot;==typeof b?b:a;return this};!C&amp;&amp;!B||B&amp;&amp;9<=Number(ub)||C&amp;&amp;D(&quot;1.9.1&quot;);B&amp;&amp;D(&quot;9&quot;);var F=document,u=window;var Cb=null,H=function(a,b){Qa(a,b,void 0)},Db=function(){if(!F.body)return!1;if(!Cb){var a=F.createElement(&quot;iframe&quot;);a.style.display=&quot;none&quot;;a.id=&quot;anonIframe&quot;;Cb=a;F.body.appendChild(a)}return!0},Eb=!!window.google_async_iframe_id,I=Eb&amp;&amp;window.parent||window;var Fb,ra=new pa(1);Fb=new Sa(new function(){this.T=&quot;http:&quot;===u.location.protocol?&quot;http:&quot;:&quot;https:&quot;;this.N=&quot;pagead2.googlesyndication.com&quot;;this.S=&quot;/pagead/gen_204?id=&quot;;this.M=.01;this.U=Math.random()},&quot;jserror&quot;,!0);ra.install(function(){if(Eb&amp;&amp;!v(I)){var a=&quot;.&quot;+F.domain;try{for(;2<a.split(&quot;.&quot;).length&amp;&amp;!v(I);)F.domain=a=a.substr(a.indexOf(&quot;.&quot;)+1),I=window.parent}catch(b){}v(I)||(I=window)}return I}());var Gb=function(a,b){a=a.toString();return Wa(Fb,a,sa(a,b))},J=function(a,b){return Gb(a.toString(),b)};B&amp;&amp;D(&quot;9&quot;);!hb||D(&quot;528&quot;);C&amp;&amp;D(&quot;1.9b&quot;)||B&amp;&amp;D(&quot;8&quot;)||fb&amp;&amp;D(&quot;9.5&quot;)||hb&amp;&amp;D(&quot;528&quot;);C&amp;&amp;!D(&quot;8&quot;)||B&amp;&amp;D(&quot;9&quot;);var Hb=0,K={},Jb=function(a){var b=K.imageLoadingEnabled;if(null!=b)a(b);else{var c=!1;Ib(function(b,e){delete K[e];c||(c=!0,null!=K.imageLoadingEnabled||(K.imageLoadingEnabled=b),a(b))})}},Ib=function(a){var b=new Image,c,d=&quot;&quot;+Hb++;K[d]=b;b.onload=function(){clearTimeout(c);a(!0,d)};c=setTimeout(function(){a(!1,d)},300);b.src=&quot;data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==&quot;},Kb=function(a){if(a){var b=document.createElement(&quot;OBJECT&quot;);b.data=a;b.width=&quot;1&quot;;b.height=&quot;1&quot;;b.style.visibility=&quot;hidden&quot;;var c=&quot;&quot;+Hb++;K[c]=b;b.onload=b.onerror=function(){delete K[c]};document.body.appendChild(b)}},Lb=function(a){if(a){var b=new Image,c=&quot;&quot;+Hb++;K[c]=b;b.onload=b.onerror=function(){delete K[c]};b.src=a}},Mb=function(a){a&amp;&amp;Jb(function(b){b?Lb(a):Kb(a)})};var Nb={K:&quot;ud=1&quot;,J:&quot;ts=0&quot;,aa:&quot;sc=1&quot;,G:&quot;gz=1&quot;,H:&quot;op=1&quot;,ba:&quot;efp=1&quot;,$:&quot;rda=1&quot;,Y:&quot;dcl=1&quot;,X:&quot;ocy=1&quot;,W:&quot;cvh=1&quot;,F:&quot;co=1&quot;,Z:&quot;mlc=1&quot;,I:&quot;opp=1&quot;};if(F&amp;&amp;F.URL){var Da=F.URL,Ob=!(Da&amp;&amp;0<Ea().length);Fb.j=Ob}var L=function(a,b,c,d){c=Gb((d||&quot;osd_or_lidar::&quot;+b).toString(),c);Ia(a,b,c,{capture:void 0})},Pb=function(a,b,c){if(!(0>=b)){var d=0,e=function(){a();d++;d<b&amp;&amp;u.setTimeout(Gb(c.toString(),e),100)};e()}};var Qb=function(a,b){this.b=a||0;this.a=b||&quot;&quot;},Rb=function(a,b){a.b&amp;&amp;(b[4]=a.b);a.a&amp;&amp;(b[12]=a.a)};Qb.prototype.match=function(a){return(this.b||this.a)&amp;&amp;(a.b||a.a)?this.a||a.a?this.a==a.a:this.b||a.b?this.b==a.b:!1:!1};Qb.prototype.toString=function(){var a=&quot;&quot;+this.b;this.a&amp;&amp;(a+=&quot;-&quot;+this.a);return a};var Sb=function(){var a=M,b=[];a.b&amp;&amp;b.push(&quot;adk=&quot;+a.b);a.a&amp;&amp;b.push(&quot;exk=&quot;+a.a);return b},Tb=function(a){var b=[];Ya(a,function(a,d){d=encodeURIComponent(d);l(a)&amp;&amp;(a=encodeURIComponent(a));b.push(d+&quot;=&quot;+a)});b.push(&quot;24=&quot;+(new Date).getTime());return b.join(&quot;\\n&quot;)},N=0,Ub=0,Vb=function(a,b){var c=0,d=u;try{if(d&amp;&amp;d.Goog_AdSense_getAdAdapterInstance)return d}catch(f){}var e=d.location&amp;&amp;d.location.ancestorOrigins;if(!(void 0===e||e&amp;&amp;e.length))return null;for(;d&amp;&amp;5>c;){try{if(d.google_osd_static_frame)return d}catch(f){}try{if(d.aswift_0&amp;&amp;(!a||d.aswift_0.google_osd_static_frame))return d.aswift_0}catch(f){}c++;d=b?0<d.location.ancestorOrigins.length&amp;&amp;d.location.origin==d.location.ancestorOrigins[0]?d.parent:null:d!=d.parent?d.parent:null}return null},Wb=function(a,b,c,d,e,f,g){g=g||aa;if(10<Ub)u.clearInterval(N),g();else if(++Ub,u.postMessage&amp;&amp;(b.b||b.a)){if(f=Vb(!0,f)){g={};Rb(b,g);g[0]=&quot;goog_request_monitoring&quot;;g[6]=a;g[16]=c;d&amp;&amp;d.length&amp;&amp;(g[17]=d.join(&quot;,&quot;));e&amp;&amp;(g[19]=e);try{var k=Tb(g);f.postMessage(k,&quot;*&quot;)}catch(m){}}}else u.clearInterval(N),g()},Xb=function(a){var b=Vb(!1),c=!b;!b&amp;&amp;u&amp;&amp;(b=u.parent);if(b&amp;&amp;b.postMessage)try{b.postMessage(a,&quot;*&quot;),c&amp;&amp;u.postMessage(a,&quot;*&quot;)}catch(d){}};var O=!1,Yb=function(a){if(a=a.match(/[\\d]+/g))a.length=3};(function(){if(navigator.plugins&amp;&amp;navigator.plugins.length){var a=navigator.plugins[&quot;Shockwave Flash&quot;];if(a&amp;&amp;(O=!0,a.description)){Yb(a.description);return}if(navigator.plugins[&quot;Shockwave Flash 2.0&quot;]){O=!0;return}}if(navigator.mimeTypes&amp;&amp;navigator.mimeTypes.length&amp;&amp;(a=navigator.mimeTypes[&quot;application/x-shockwave-flash&quot;],O=!(!a||!a.enabledPlugin))){Yb(a.enabledPlugin.description);return}try{var b=new ActiveXObject(&quot;ShockwaveFlash.ShockwaveFlash.7&quot;);O=!0;Yb(b.GetVariable(&quot;$version&quot;));return}catch(c){}try{b=new ActiveXObject(&quot;ShockwaveFlash.ShockwaveFlash.6&quot;);O=!0;return}catch(c){}try{b=new ActiveXObject(&quot;ShockwaveFlash.ShockwaveFlash&quot;),O=!0,Yb(b.GetVariable(&quot;$version&quot;))}catch(c){}})();(function(){var a;return jb?(a=/Windows NT ([0-9.]+)/,(a=a.exec(x))?a[1]:&quot;0&quot;):ib?(a=/10[_.][0-9_.]+/,(a=a.exec(x))?a[0].replace(/_/g,&quot;.&quot;):&quot;10&quot;):kb?(a=/Android\\s+([^\\);]+)(\\)|;)/,(a=a.exec(x))?a[1]:&quot;&quot;):lb||mb||nb?(a=/(?:iPhone|CPU)\\s+OS\\s+(\\S+)/,(a=a.exec(x))?a[1].replace(/_/g,&quot;.&quot;):&quot;&quot;):&quot;&quot;})();var P=function(a){return(a=a.exec(x))?a[1]:&quot;&quot;};(function(){if(wb)return P(/Firefox\\/([0-9.]+)/);if(B||gb||fb)return tb;if(Ab)return P(/Chrome\\/([0-9.]+)/);if(Bb&amp;&amp;!(A()||y(&quot;iPad&quot;)||y(&quot;iPod&quot;)))return P(/Version\\/([0-9.]+)/);if(xb||yb){var a=/Version\\/(\\S+).*Mobile\\/(\\S+)/.exec(x);if(a)return a[1]+&quot;.&quot;+a[2]}else if(zb)return(a=P(/Android\\s+([0-9.]+)/))?a:P(/Version\\/([0-9.]+)/);return&quot;&quot;})();var Zb=function(){var a=u;return null!==a&amp;&amp;a.top!=a},ac=function(){var a=Zb(),b=a&amp;&amp;0<=&quot;//tpc.googlesyndication.com&quot;.indexOf(u.location.host);if(a&amp;&amp;u.name&amp;&amp;0==u.name.indexOf(&quot;google_ads_iframe&quot;)||b){var c;a=u||u;try{var d;if(a.document&amp;&amp;!a.document.body)d=new E(-1,-1);else{var e=(a||window).document,f=&quot;CSS1Compat&quot;==e.compatMode?e.documentElement:e.body;d=(new E(f.clientWidth,f.clientHeight)).round()}c=d}catch(g){c=new E(-12245933,-12245933)}return $b(c)}c=(u.document||document).getElementsByTagName(&quot;SCRIPT&quot;);return 0<c.length&amp;&amp;(c=c[c.length-1],c.parentElement&amp;&amp;c.parentElement.id&amp;&amp;0<c.parentElement.id.indexOf(&quot;_ad_container&quot;))?$b(void 0,c.parentElement):null},$b=function(a,b){var c=bc(&quot;IMG&quot;,a,b);return c?c:(c=bc(&quot;IFRAME&quot;,a,b))?c:(a=bc(&quot;OBJECT&quot;,a,b))?a:null},bc=function(a,b,c){var d=document;c=c||d;d=a&amp;&amp;&quot;*&quot;!=a?String(a).toUpperCase():&quot;&quot;;c=c.querySelectorAll&amp;&amp;c.querySelector&amp;&amp;d?c.querySelectorAll(d+&quot;&quot;):c.getElementsByTagName(d||&quot;*&quot;);for(d=0;d<c.length;d++){var e=c[d];if(&quot;OBJECT&quot;==a)a:{var f=e.getAttribute(&quot;height&quot;);if(null!=f&amp;&amp;0<f&amp;&amp;0==e.clientHeight)for(var f=e.children,g=0;g<f.length;g++){var k=f[g];if(&quot;OBJECT&quot;==k.nodeName||&quot;EMBED&quot;==k.nodeName){e=k;break a}}}f=e.clientHeight;g=e.clientWidth;if(k=b)k=new E(g,f),k=Math.abs(b.width-k.width)<.1*b.width&amp;&amp;Math.abs(b.height-k.height)<.1*b.height;if(k||!b&amp;&amp;10<f&amp;&amp;10<g)return e}return null};var Q=0,R=&quot;&quot;,cc=[],S=!1,T=!1,U=!1,dc=!0,ec=!1,fc=!1,gc=!1,hc=!1,ic=!1,jc=!1,lc=0,mc=0,V=0,nc=[],M=null,oc=&quot;&quot;,pc=[],qc=null,rc=[],sc=!1,tc=&quot;&quot;,uc=&quot;&quot;,vc=(new Date).getTime(),wc=!1,xc=&quot;&quot;,yc=!1,zc=[&quot;1&quot;,&quot;0&quot;,&quot;3&quot;],W=0,Y=0,Ac=0,Bc=&quot;&quot;,Cc=!1,Dc=!1,Fc=function(a,b,c){S&amp;&amp;(dc||3!=(c||3)||gc)&amp;&amp;Ec(a,b,!0);if(U||T&amp;&amp;fc)Ec(a,b),T=U=!1},Gc=function(){var a=qc;return a?2!=a():!0},Ec=function(a,b,c){if((b=b||oc)&amp;&amp;!sc&amp;&amp;(2==Y||c)&amp;&amp;Gc()){for(var d=0;d<cc.length;++d){var e=Hc(cc[d],b,c),f=a;ec?Mb(e):H(f,e)}ic=!0;c?S=!1:sc=!0}},Ic=function(a,b){var c=[];a&amp;&amp;c.push(&quot;avi=&quot;+a);b&amp;&amp;c.push(&quot;cid=&quot;+b);return c.length?&quot;//pagead2.googlesyndication.com/activeview?&quot;+c.join(&quot;&amp;&quot;):&quot;//pagead2.googlesyndication.com/activeview&quot;},Hc=function(a,b,c){c=c?&quot;osdim&quot;:U?&quot;osd2&quot;:&quot;osdtos&quot;;a=[a,-1<a.indexOf(&quot;?&quot;)?&quot;&amp;id=&quot;:&quot;?id=&quot;,c];&quot;osd2&quot;==c&amp;&amp;T&amp;&amp;fc&amp;&amp;a.push(&quot;&amp;ts=1&quot;);a.push(&quot;&amp;ti=1&quot;);a.push(&quot;&amp;&quot;,b);a.push(&quot;&amp;uc=&quot;+Ac);wc?a.push(&quot;&amp;tgt=&quot;+xc):a.push(&quot;&amp;tgt=nf&quot;);a.push(&quot;&amp;cl=&quot;+(yc?1:0));jc&amp;&amp;(a.push(&quot;&amp;lop=1&quot;),b=r()-lc,a.push(&quot;&amp;tslp=&quot;+b));b=a.join(&quot;&quot;);for(a=0;a<pc.length;a++){try{var d=pc[a]()}catch(e){}c=&quot;max_length&quot;;2<=d.length&amp;&amp;(3==d.length&amp;&amp;(c=d[2]),b=fa(b,encodeURIComponent(d[0]),encodeURIComponent(d[1]),c))}2E3<b.length&amp;&amp;(b=b.substring(0,2E3));return b},Z=function(a){if(tc){try{var b=fa(tc,&quot;vi&quot;,a);Db()&amp;&amp;H(Cb.contentWindow,b)}catch(c){}0<=ka(zc,a)&amp;&amp;(tc=&quot;&quot;)}},Jc=function(){Z(&quot;-1&quot;)},Lc=function(a){if(a&amp;&amp;a.data&amp;&amp;l(a.data)){var b;var c=a.data;if(l(c)){b={};for(var c=c.split(&quot;\\n&quot;),d=0;d<c.length;d++){var e=c[d].indexOf(&quot;=&quot;);if(!(0>=e)){var f=Number(c[d].substr(0,e)),e=c[d].substr(e+1);switch(f){case 5:case 8:case 11:case 15:case 16:case 18:e=&quot;true&quot;==e;break;case 4:case 7:case 6:case 14:case 20:case 21:case 22:case 23:case 24:case 25:e=Number(e);break;case 3:case 19:if(&quot;function&quot;==ba(decodeURIComponent))try{e=decodeURIComponent(e)}catch(k){throw Error(&quot;Error: URI malformed: &quot;+e);}break;case 17:e=ma(decodeURIComponent(e).split(&quot;,&quot;),Number)}b[f]=e}}b=b[0]?b:null}else b=null;if(b&amp;&amp;(c=new Qb(b[4],b[12]),M&amp;&amp;M.match(c))){for(c=0;c<rc.length;c++)rc[c](b);b&amp;&amp;(c=100*b[25],&quot;number&quot;==typeof c&amp;&amp;!isNaN(c)&amp;&amp;(window.document[&quot;4CGeArbVQ&quot;]=c|0));void 0!=b[18]&amp;&amp;(gc=b[18],gc||2!=V||(V=3,Kc()));Dc&amp;&amp;void 0!=b[7]&amp;&amp;0<b[7]&amp;&amp;(c=u,d=&quot;//pagead2.googlesyndication.com/pagead/gen_204?id=ac_opp&amp;vsblt=&quot;+b[7],R&amp;&amp;(d+=&quot;&amp;avi=&quot;+R),ec?Mb(d):H(c,d),Dc=!1);c=b[0];if(&quot;goog_acknowledge_monitoring&quot;==c)u.clearInterval(N),W=2;else if(&quot;goog_get_mode&quot;==c){W=1;d={};M&amp;&amp;Rb(M,d);d[0]=&quot;goog_provide_mode&quot;;d[6]=Y;d[19]=Bc;d[16]=T;try{var g=Tb(d);a.source.postMessage(g,a.origin)}catch(k){}u.clearInterval(N);W=2}else&quot;goog_update_data&quot;==c?(oc=b[3],++Ac):&quot;goog_image_request&quot;==c&amp;&amp;(Fc(u,b[3]),b[5]||b[11]||Z(&quot;0&quot;));if(&quot;goog_update_data&quot;==c||&quot;goog_image_request&quot;==c)(1==Y||2==Y||S)&amp;&amp;b[5]&amp;&amp;(a=1==b[15]&amp;&amp;&quot;goog_update_data&quot;==c,fc=!0,Z(&quot;1&quot;),uc&amp;&amp;Gc()&amp;&amp;(g=uc,Db()&amp;&amp;H(Cb.contentWindow,g),uc=&quot;&quot;),S&amp;&amp;!a&amp;&amp;(Ec(u,void 0,!0),hc=!0,mc=r()),3==V&amp;&amp;(V=4,Kc()),S||1!=Y||(sc=!0)),(1==Y||2==Y||S)&amp;&amp;b[11]&amp;&amp;(T=!1,Z(&quot;3&quot;),S&amp;&amp;(Ec(u,void 0,!0),1==V&amp;&amp;gc&amp;&amp;(V=2)))}}},Kc=function(){var a=u,b=V;0!=b&amp;&amp;1!=b&amp;&amp;Mc(a,&quot;osdim&quot;,&quot;zas=&quot;+b)},Mc=function(a,b,c){var d=[];R&amp;&amp;d.push(&quot;avi=&quot;+R);d.push(&quot;id=&quot;+b);d.push(&quot;ovr_value=&quot;+Q);jc&amp;&amp;d.push(&quot;lop=1&quot;);M&amp;&amp;(d=d.concat(Sb()));d.push(&quot;tt=&quot;+((new Date).getTime()-vc));d.push(c);a.document&amp;&amp;a.document.referrer&amp;&amp;d.push(&quot;ref=&quot;+encodeURIComponent(a.document.referrer));try{H(a,&quot;//pagead2.googlesyndication.com/pagead/gen_204?&quot;+d.join(&quot;&amp;&quot;))}catch(e){}},Nc=function(){Fc(u);Z(&quot;0&quot;);2>W&amp;&amp;!T&amp;&amp;2==Y&amp;&amp;Mc(u,&quot;osd2&quot;,&quot;hs=&quot;+W)},Oc=function(){var a={};Rb(M,a);a[0]=&quot;goog_dom_content_loaded&quot;;var b=Tb(a);try{Pb(function(){Xb(b)},10,&quot;osd_listener::ldcl_int&quot;)}catch(c){}},Pc=function(){var a={};Rb(M,a);a[0]=&quot;goog_creative_loaded&quot;;var b=Tb(a);Pb(function(){Xb(b)},10,&quot;osd_listener::lcel_int&quot;);yc=!0},Qc=function(a){if(l(a)){a=a.split(&quot;&amp;&quot;);for(var b=a.length-1;0<=b;b--){var c=a[b],d=Nb;c==d.K?(dc=!1,a.splice(b,1)):c==d.G?(V=1,a.splice(b,1)):c==d.J?(T=!1,a.splice(b,1)):c==d.H?(ec=!0,a.splice(b,1)):c==d.F?(Cc=!0,a.splice(b,1)):c==d.I&amp;&amp;(Dc=!0,a.splice(b,1))}Bc=a.join(&quot;&amp;&quot;)}},Rc=function(){if(!wc){var a=ac();a&amp;&amp;(wc=!0,xc=a.tagName,a.complete||a.naturalWidth?Pc():L(a,&quot;load&quot;,Pc,&quot;osd_listener::creative_load&quot;))}};t(&quot;osdlfm&quot;,J(&quot;osd_listener::init&quot;,function(a,b,c,d,e,f,g,k,m,p){Q=a;tc=b;uc=d;S=f;g&amp;&amp;Qc(g);T=f;1==k?nc.push(947190538):2==k?nc.push(947190541):3==k&amp;&amp;nc.push(947190542);M=new Qb(e,ga());L(u,&quot;load&quot;,Jc,&quot;osd_listener::load&quot;);L(u,&quot;message&quot;,Lc,&quot;osd_listener::message&quot;);R=c||&quot;&quot;;cc=[p||Ic(c,m)];L(u,&quot;unload&quot;,Nc,&quot;osd_listener::unload&quot;);var n=u.document;!n.readyState||&quot;complete&quot;!=n.readyState&amp;&amp;&quot;loaded&quot;!=n.readyState?!cb()||0<=ja(eb(),11)?L(n,&quot;DOMContentLoaded&quot;,Oc,&quot;osd_listener::dcl&quot;):L(n,&quot;readystatechange&quot;,function(){&quot;complete&quot;!=n.readyState&amp;&amp;&quot;loaded&quot;!=n.readyState||Oc()},&quot;osd_listener::rsc&quot;):Oc();-1==Q?Y=f?3:1:-2==Q?Y=3:0<Q&amp;&amp;(Y=2,U=!0);T&amp;&amp;!U&amp;&amp;-1==Q&amp;&amp;(Y=2);M&amp;&amp;(M.b||M.a)&amp;&amp;(W=1,N=u.setInterval(Gb(&quot;osd_proto::reqm_int&quot;.toString(),ea(Wb,Y,M,T,nc,Bc,Cc,void 0)),500));Pb(Rc,5,&quot;osd_listener:sfc&quot;)}));t(&quot;osdlac&quot;,J(&quot;osd_listener::lac_ex&quot;,function(a){pc.push(a)}));t(&quot;osdlamrc&quot;,J(&quot;osd_listener::lamrc_ex&quot;,function(a){rc.push(a)}));t(&quot;osdsir&quot;,J(&quot;osd_listener::sir_ex&quot;,Fc));t(&quot;osdacrc&quot;,J(&quot;osd_listener::acrc_ex&quot;,function(a){qc=a}));t(&quot;osdpcls&quot;,J(&quot;osd_listener::acrc_ex&quot;,function(a){if(!a||!Zb()||sc||ic&amp;&amp;!hc)return!1;jc=!0;a=/^(http[s]?:)?\\/\\//.test(a)?a:Ic(a);if(hc){var b=Hc(a,oc,!0),c=r()-mc,b=ya(b,&quot;tsvp&quot;,c),c=u;ec?Mb(b):H(c,b)}cc.push(a);lc=r();return!0}));}).call(this);</script><script type=&quot;text/javascript&quot;>osdlfm(-1,\'\',\'BkBoIWrBPWPukIY3TogPnpLK4BQCXy564hAEAABABOAHIAQngAgDgBAGgBiHSCAUIgGEQAQ\',\'\',1612211856,true,\'ocy\\x3d1\\x26ud\\x3d1\\x26cvh\\x3d1\\x26la\\x3d0\\x26\',3,\'CAASFeRoex0pv6O7LqhyhHDCJWP5YByajw\',\'//pagead2.googlesyndication.com/activeview?avi\\x3dBkBoIWrBPWPukIY3TogPnpLK4BQCXy564hAEAABABOAHIAQngAgDgBAGgBiHSCAUIgGEQAQ\\x26cid\\x3dCAASFeRoex0pv6O7LqhyhHDCJWP5YByajw\');</script><img src=&quot;//www.google.com/ads/measurement/l?ebcid=ALh7CaTn4mWtQjbt2QX7T_0FDJ-QIdGKxEB2imwqFD7UpTDTIMR3YKsj8HYQppuMwrDE0q0SITVfkHFcZq4ppviWwcYOA3vdzw&quot; style=&quot;display:none;&quot;></img><script>if (window.top &amp;&amp; window.top.postMessage) {window.top.postMessage(\'{&quot;googMsgType&quot;:&quot;adpnt&quot;}\',\'*\');}</script><script src=&quot;https://tpc.googlesyndication.com/safeframe/1-0-5/js/ext.js&quot;></script></body></html>{&quot;uid&quot;:2,&quot;hostPeerName&quot;:&quot;https://yourstory.com&quot;,&quot;initialGeometry&quot;:&quot;{\\&quot;windowCoords_t\\&quot;:0,\\&quot;windowCoords_r\\&quot;:1366,\\&quot;windowCoords_b\\&quot;:728,\\&quot;windowCoords_l\\&quot;:0,\\&quot;frameCoords_t\\&quot;:858,\\&quot;frameCoords_r\\&quot;:654.90625,\\&quot;frameCoords_b\\&quot;:1108,\\&quot;frameCoords_l\\&quot;:354.90625,\\&quot;styleZIndex\\&quot;:\\&quot;auto\\&quot;,\\&quot;allowedExpansion_t\\&quot;:458,\\&quot;allowedExpansion_r\\&quot;:694.09375,\\&quot;allowedExpansion_b\\&quot;:0,\\&quot;allowedExpansion_l\\&quot;:354.90625,\\&quot;xInView\\&quot;:1,\\&quot;yInView\\&quot;:0.816}&quot;,&quot;permissions&quot;:&quot;{\\&quot;expandByOverlay\\&quot;:false,\\&quot;expandByPush\\&quot;:false,\\&quot;readCookie\\&quot;:false,\\&quot;writeCookie\\&quot;:false}&quot;,&quot;metadata&quot;:&quot;{\\&quot;shared\\&quot;:{\\&quot;sf_ver\\&quot;:\\&quot;1-0-5\\&quot;,\\&quot;ck_on\\&quot;:1,\\&quot;flash_ver\\&quot;:\\&quot;24.0.0\\&quot;}}&quot;,&quot;reportCreativeGeometry&quot;:false,&quot;isDifferentSourceWindow&quot;:false}" scrolling="no" marginwidth="0" marginheight="0" width="300" height="250" data-is-safeframe="true" style="margin: 0px 0px 15px; padding: 0px; border-width: 0px; border-style: initial; outline: 0px; background: transparent; width: 300px; vertical-align: bottom;"></iframe></div></div></div><p style="margin-top: 30px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; text-align: start;">I laughed right back (laughter is my best self-preservation mechanism) – also, it was all I could do. To be honest, I felt a little bit lesser about myself as if I was inferior, not good enough. Later that night, I began questioning myself – what was wrong with me that I hadn’t been able to raise any money when everyone else around me seemed to be making the front page with one round of funding or another?</p>', '2016-12-13 01:55:18', 1, '2016-12-14 04:01:44', 1, 1);
INSERT INTO `tblmvbfaqmanagement` (`faq_id_pk`, `faq_question`, `faq_description`, `faq_createdDate`, `faq_createdBy`, `faq_modifiedDate`, `faq_modifiedBy`, `faq_status`) VALUES
(2, 'Demo2', '<p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; text-align: start;"><span style="margin: 0px; padding: 0px; border: 0px; outline: 0px; background: transparent;">Even as the Indian startup ecosystem was debating the need for a protectionist policy towards domestic startups, Uber Founder and CEO Travis Kalanick landed in India courting ministers, rubbing shoulders with cricket celebrities, giving ‘gyaan’ to startup founders and entrepreneurs,&nbsp;and, of course, launching yet another Uber service here.</span></p><figure id="attachment_242127" class="wp-caption aligncenter" style="margin: 5px auto; padding: 5px 3px 10px; border: 1px solid rgb(240, 240, 240); outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; max-width: 96%; text-align: center; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; width: 800px;"><img class="wp-image-242127 size-full" src="https://d152j5tfobgaot.cloudfront.net/wp-content/uploads/2016/12/Uber-Travis.png" alt="uber-travis" width="800" height="400" style="border-style: none; margin: 0px; padding: 0px; outline: 0px; background: transparent; height: auto; max-width: 100%; width: auto;"><figcaption class="wp-caption-text" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; background: transparent;">Travis launched UberMOTO in Hyderabad.</figcaption></figure><p style="margin-top: 30px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; text-align: start;">Travis arrived in&nbsp;<a href="https://yourstory.com/2016/12/ubermoto-says-namaskaram-hyderabad/" target="_blank" style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; margin: 0px; padding: 0px; vertical-align: baseline; color: rgb(229, 0, 45);">Hyderabad today to launch Uber’s &nbsp;bike-sharing service, UberMOTO</a>&nbsp;at a T-Hub event along with Telangana Minister for IT E&amp;C, MAUD, Industries &amp; Commerce, KT Rama Rao.</p>', '2016-12-14 03:39:09', 1, '2016-12-14 03:39:09', 1, 1);
INSERT INTO `tblmvbfaqmanagement` (`faq_id_pk`, `faq_question`, `faq_description`, `faq_createdDate`, `faq_createdBy`, `faq_modifiedDate`, `faq_modifiedBy`, `faq_status`) VALUES
(3, 'Demo12441233', '<p style="margin-top: 30px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; text-align: start;">Going to an investor’s office is a little overwhelming – like going to a fancy five-star hotel when you normally spend your time at tea stalls for your daily fix.</p><p style="margin-top: 30px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; text-align: start;">I was in one such office at the beginning of 2015 to meet an investor and bumped into one of the partners. He asked me how I was, politely chatted for a bit and then asked, “Did you raise any money? Angel funding?” I said I hadn’t (<span data-primary-role="COMPANY" data-domain="yourstory.com" class="profiles_highlight" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; background: rgba(232, 146, 151, 0.247059); border-radius: 3px; cursor: pointer;">YourStory</span>&nbsp;was bootstrapped at that point of time). And then he laughed – rather dismissively. “You know so many people in the ecosystem and you still haven’t managed to get any money?”</p><div id="banner_inside_article" class="phn-tab-hide mb-20 mt-20" style="margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; margin-top: 20px !important; margin-bottom: 20px !important;"><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; background: transparent;"></p><div id="YS-AP-ZONE4-300X250-SLOT-IN-0" data-google-query-id="CPu5xqXf8NACFY2paAodZ5IMVw" style="margin: 0px auto; padding: 0px; border: 0px; outline: 0px; background: transparent; height: 250px; width: 300px;"><div id="google_ads_iframe_/102423847/YS-AP-ZONE4-300X250_0__container__" style="margin: 0px; padding: 0px; border: 0pt none; outline: 0px; background: transparent; display: inline-block; width: 300px; height: 250px;"><iframe frameborder="0" src="https://tpc.googlesyndication.com/safeframe/1-0-5/html/container.html#xpc=sf-gdn-exp-2&amp;p=https%3A//yourstory.com" id="google_ads_iframe_/102423847/YS-AP-ZONE4-300X250_0" title="3rd party ad content" name="1-0-5;36422;<!doctype html><html><head><script>var google_casm=[&quot;&quot;,0,null,0];</script></head><body leftMargin=&quot;0&quot; topMargin=&quot;0&quot; marginwidth=&quot;0&quot; marginheight=&quot;0&quot;><script>(function(){var g=this,l=function(a,b){var c=a.split(&quot;.&quot;),d=g;c[0]in d||!d.execScript||d.execScript(&quot;var &quot;+c[0]);for(var e;c.length&amp;&amp;(e=c.shift());)c.length||void 0===b?d=d[e]?d[e]:d[e]={}:d[e]=b},m=function(a,b,c){return a.call.apply(a.bind,arguments)},n=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},p=function(a,b,c){p=Function.prototype.bind&amp;&amp;-1!=Function.prototype.bind.toString().indexOf(&quot;native code&quot;)?m:n;return p.apply(null,arguments)},q=Date.now||function(){return+new Date};var r=document,s=window;var t=function(a,b){for(var c in a)Object.prototype.hasOwnProperty.call(a,c)&amp;&amp;b.call(null,a[c],c,a)},w=function(a,b){a.google_image_requests||(a.google_image_requests=[]);var c=a.document.createElement(&quot;img&quot;);c.src=b;a.google_image_requests.push(c)};var x=function(a){return{visible:1,hidden:2,prerender:3,preview:4}[a.webkitVisibilityState||a.mozVisibilityState||a.visibilityState||&quot;&quot;]||0},y=function(a){var b;a.mozVisibilityState?b=&quot;mozvisibilitychange&quot;:a.webkitVisibilityState?b=&quot;webkitvisibilitychange&quot;:a.visibilityState&amp;&amp;(b=&quot;visibilitychange&quot;);return b};var C=function(){this.g=r;this.k=s;this.j=!1;this.i=null;this.h=[];this.o={};if(z)this.i=q();else if(3==x(this.g)){this.i=q();var a=p(this.q,this);A&amp;&amp;(a=A(&quot;di::vch&quot;,a));this.p=a;var b=this.g,c=y(this.g);b.addEventListener?b.addEventListener(c,a,!1):b.attachEvent&amp;&amp;b.attachEvent(&quot;on&quot;+c,a)}else B(this)},A;C.m=function(){return C.n?C.n:C.n=new C};var D=/^([^:]+:\\/\\/[^/]+)/m,G=/^\\d*,(.+)$/m,z=!1,B=function(a){if(!a.j){a.j=!0;for(var b=0;b<a.h.length;++b)a.l.apply(a,a.h[b]);a.h=[]}};C.prototype.s=function(a,b){var c=b.target.u();(c=G.exec(c))&amp;&amp;(this.o[a]=c[1])};C.prototype.l=function(a,b){this.k.rvdt=this.i?q()-this.i:0;var c;if(c=this.t)t:{try{var d=D.exec(this.k.location.href),e=D.exec(a);if(d&amp;&amp;e&amp;&amp;d[1]==e[1]&amp;&amp;b){var f=p(this.s,this,b);this.t(a,f);c=!0;break t}}catch(u){}c=!1}c||w(this.k,a)};C.prototype.q=function(){if(3!=x(this.g)){B(this);var a=this.g,b=y(this.g),c=this.p;a.removeEventListener?a.removeEventListener(b,c,!1):a.detachEvent&amp;&amp;a.detachEvent(&quot;on&quot;+b,c)}};var H=/^true$/.test(&quot;&quot;)?!0:!1;var I={},J=function(a){var b=a.toString();a.name&amp;&amp;-1==b.indexOf(a.name)&amp;&amp;(b+=&quot;: &quot;+a.name);a.message&amp;&amp;-1==b.indexOf(a.message)&amp;&amp;(b+=&quot;: &quot;+a.message);if(a.stack){a=a.stack;var c=b;try{-1==a.indexOf(c)&amp;&amp;(a=c+&quot;\\n&quot;+a);for(var d;a!=d;)d=a,a=a.replace(/((https?:\\/..*\\/)[^\\/:]*:\\d+(?:.|\\n)*)\\2/,&quot;$1&quot;);b=a.replace(/\\n */g,&quot;\\n&quot;)}catch(e){b=c}}return b},M=function(a,b,c,d){var e=K,f,u=!0;try{f=b()}catch(h){try{var N=J(h);b=&quot;&quot;;h.fileName&amp;&amp;(b=h.fileName);var E=-1;h.lineNumber&amp;&amp;(E=h.lineNumber);var v;t:{try{v=c?c():&quot;&quot;;break t}catch(S){}v=&quot;&quot;}u=e(a,N,b,E,v)}catch(k){try{var O=J(k);a=&quot;&quot;;k.fileName&amp;&amp;(a=k.fileName);c=-1;k.lineNumber&amp;&amp;(c=k.lineNumber);K(&quot;pAR&quot;,O,a,c,void 0,void 0)}catch(F){L({context:&quot;mRE&quot;,msg:F.toString()+&quot;\\n&quot;+(F.stack||&quot;&quot;)},void 0)}}if(!u)throw h;}finally{if(d)try{d()}catch(T){}}return f},K=function(a,b,c,d,e,f){a={context:a,msg:b.substring(0,512),eid:e&amp;&amp;e.substring(0,40),file:c,line:d.toString(),url:r.URL.substring(0,512),ref:r.referrer.substring(0,512)};P(a);L(a,f);return!0},L=function(a,b){try{if(Math.random()<(b||.01)){var c=&quot;/pagead/gen_204?id=jserror&quot;+Q(a),d=&quot;http&quot;+(&quot;https:&quot;==s.location.protocol?&quot;s&quot;:&quot;&quot;)+&quot;://pagead2.googlesyndication.com&quot;+c,d=d.substring(0,2E3);w(s,d)}}catch(e){}},P=function(a){var b=a||{};t(I,function(a,d){b[d]=s[a]})},R=function(a,b,c,d,e){return function(){var f=arguments;return M(a,function(){return b.apply(c,f)},d,e)}},Q=function(a){var b=&quot;&quot;;t(a,function(a,d){if(0===a||a)b+=&quot;&amp;&quot;+d+&quot;=&quot;+(&quot;function&quot;==typeof encodeURIComponent?encodeURIComponent(a):escape(a))});return b};A=function(a,b,c,d){return R(a,b,void 0,c,d)};z=H;l(&quot;vu&quot;,R(&quot;vu&quot;,function(a,b){var c=a.replace(&quot;&amp;amp;&quot;,&quot;&amp;&quot;),d=/(google|doubleclick).*\\/pagead\\/adview/.test(c),e=C.m();if(d){d=&quot;&amp;vis=&quot;+x(e.g);b&amp;&amp;(d+=&quot;&amp;ve=1&quot;);var f=c.indexOf(&quot;&amp;adurl&quot;),c=-1==f?c+d:c.substring(0,f)+d+c.substring(f)}e.j?e.l(c,b):e.h.push([c,b])}));l(&quot;vv&quot;,R(&quot;vv&quot;,function(){z&amp;&amp;B(C.m())}));})();</script><script>vu(&quot;https://adx.g.doubleclick.net/pagead/adview?ai\\x3dCbs0zWrBPWPukIY3TogPnpLK4BdyT9JRGl8ueuIQBwI23ARABIABg5ermg7wOggEXY2EtcHViLTIzNjQxMzgzMDcwNTIzOTfIAQngAgCoAwGqBMMBT9A8XFD7t4lWmih3v6JP3AFUxBb9FuBoXRGaos48Elbb-nznNRFoM-gg4hEAWLZD5_Ntzx53SUf2IvU2CTcyartNuCY4BSVbVejAwL22iLl0CKkS9mPpluMdQqIgr9cxyzZxYUWuB_NtF45zsFhTWbjRJ9Bf_aQbh9qQDpfBAExFycshGSWOd2AU50tntkGKYpUIjtcV83zRjUeAiMynXVPEvsESO7GVVq15hXT8UH7Cszxekca2NMRMV7Exg9P2cudY4AQBgAa7_6-9sujwj90BoAYhqAemvhvYBwDSCAUIgGEQAQ\\x26sigh\\x3dmIA6G8DKfuk&quot;)</script><script language=\'JavaScript\' src=\'https://tags.mathtag.com/notify/js?exch=adx&amp;id=5aW95q2jLzExLyAvWVdKaU5qVTNabVl0TmpGa1pDMDBNekF3TFRsaU5qTXRabVUyWVRRM1lXSmpPVFF6LzExNDczNTA5MDQ1OTQzOTY1MDYvMzA1NTAyOC8xNjQzODI0LzQveVdQSml1NEFWNGsteUhvbjNrT3prUUdwWjhnTWdXODBHX0lrMUZ6anZCQS8xLzQvMTQ4MTU5NDI0OS8wLzMxMDcyOC8yMDc2ODE5NDU2LzE1NTY3OS8yNzI5OTkvMS85MDQzMzcvMC9ZV0ppTmpVM1ptWXROakZrWkMwME16QXdMVGxpTmpNdFptVTJZVFEzWVdKak9UUXovMC8wLzAv/F4sV9Na7keK-vad4m7rkPGWa-Qk&amp;sid=1643824&amp;cid=3055028&amp;nodeid=1087&amp;price=WE-wWgAIUnsKaKmNAAySZ1QFC-XS_qz92zuncg&amp;auctionid=1147350904594396506&amp;bp=c_heibei&amp;3pck=https://adclick.g.doubleclick.net/aclk%3Fsa%3DL%26ai%3DCbs0zWrBPWPukIY3TogPnpLK4BdyT9JRGl8ueuIQBwI23ARABIABg5ermg7wOggEXY2EtcHViLTIzNjQxMzgzMDcwNTIzOTfIAQngAgCoAwGqBMMBT9A8XFD7t4lWmih3v6JP3AFUxBb9FuBoXRGaos48Elbb-nznNRFoM-gg4hEAWLZD5_Ntzx53SUf2IvU2CTcyartNuCY4BSVbVejAwL22iLl0CKkS9mPpluMdQqIgr9cxyzZxYUWuB_NtF45zsFhTWbjRJ9Bf_aQbh9qQDpfBAExFycshGSWOd2AU50tntkGKYpUIjtcV83zRjUeAiMynXVPEvsESO7GVVq15hXT8UH7Cszxekca2NMRMV7Exg9P2cudY4AQBgAa7_6-9sujwj90BoAYhqAemvhvYBwDSCAUIgGEQAQ%26num%3D1%26sig%3DAOD64_0Ny8FoiB1gkadOx_0erqstCC5XwQ%26client%3Dca-pub-2364138307052397%26adurl%3D\'></script><script>(function(){var e=this,h=function(a,b,c){return a.call.apply(a.bind,arguments)},aa=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},k=function(a,b,c){k=Function.prototype.bind&amp;&amp;-1!=Function.prototype.bind.toString().indexOf(&quot;native code&quot;)?h:aa;return k.apply(null,arguments)},l=Date.now||function(){return+new Date};var m=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\\s\\xa0]+|[\\s\\xa0]+$/g,&quot;&quot;)},p=function(a,b){return a<b?-1:a>b?1:0};var q;a:{var r=e.navigator;if(r){var u=r.userAgent;if(u){q=u;break a}}q=&quot;&quot;};var v=function(a){v[&quot; &quot;](a);return a};v[&quot; &quot;]=function(){};var ca=function(a,b){var c=ba;Object.prototype.hasOwnProperty.call(c,a)||(c[a]=b(a))};var da=-1!=q.indexOf(&quot;Opera&quot;),w=-1!=q.indexOf(&quot;Trident&quot;)||-1!=q.indexOf(&quot;MSIE&quot;),ea=-1!=q.indexOf(&quot;Edge&quot;),x=-1!=q.indexOf(&quot;Gecko&quot;)&amp;&amp;!(-1!=q.toLowerCase().indexOf(&quot;webkit&quot;)&amp;&amp;-1==q.indexOf(&quot;Edge&quot;))&amp;&amp;!(-1!=q.indexOf(&quot;Trident&quot;)||-1!=q.indexOf(&quot;MSIE&quot;))&amp;&amp;-1==q.indexOf(&quot;Edge&quot;),fa=-1!=q.toLowerCase().indexOf(&quot;webkit&quot;)&amp;&amp;-1==q.indexOf(&quot;Edge&quot;),y=function(){var a=e.document;return a?a.documentMode:void 0},z;a:{var A=&quot;&quot;,B=function(){var a=q;if(x)return/rv\\:([^\\);]+)(\\)|;)/.exec(a);if(ea)return/Edge\\/([\\d\\.]+)/.exec(a);if(w)return/\\b(?:MSIE|rv)[: ]([^\\);]+)(\\)|;)/.exec(a);if(fa)return/WebKit\\/(\\S+)/.exec(a);if(da)return/(?:Version)[ \\/]?(\\S+)/.exec(a)}();B&amp;&amp;(A=B?B[1]:&quot;&quot;);if(w){var C=y();if(null!=C&amp;&amp;C>parseFloat(A)){z=String(C);break a}}z=A}var D=z,ba={},E=function(a){ca(a,function(){for(var b=0,c=m(String(D)).split(&quot;.&quot;),d=m(String(a)).split(&quot;.&quot;),t=Math.max(c.length,d.length),n=0;0==b&amp;&amp;n<t;n++){var f=c[n]||&quot;&quot;,g=d[n]||&quot;&quot;;do{f=/(\\d*)(\\D*)(.*)/.exec(f)||[&quot;&quot;,&quot;&quot;,&quot;&quot;,&quot;&quot;];g=/(\\d*)(\\D*)(.*)/.exec(g)||[&quot;&quot;,&quot;&quot;,&quot;&quot;,&quot;&quot;];if(0==f[0].length&amp;&amp;0==g[0].length)break;b=p(0==f[1].length?0:parseInt(f[1],10),0==g[1].length?0:parseInt(g[1],10))||p(0==f[2].length,0==g[2].length)||p(f[2],g[2]);f=f[3];g=g[3]}while(0==b)}return 0<=b})},F;var G=e.document;F=G&amp;&amp;w?y()||(&quot;CSS1Compat&quot;==G.compatMode?parseInt(D,10):5):void 0;var H;if(!(H=!x&amp;&amp;!w)){var I;if(I=w)I=9<=Number(F);H=I}H||x&amp;&amp;E(&quot;1.9.1&quot;);w&amp;&amp;E(&quot;9&quot;);var ga=function(){var a=!1;try{var b=Object.defineProperty({},&quot;passive&quot;,{get:function(){a=!0}});window.addEventListener(&quot;test&quot;,null,b)}catch(c){}return a}(),J=function(a,b,c){a.addEventListener?a.addEventListener(b,c,ga?void 0:!1):a.attachEvent&amp;&amp;a.attachEvent(&quot;on&quot;+b,c)};var K=function(){ha()},ha=e.performance&amp;&amp;e.performance.now?k(e.performance.now,e.performance):l;K.prototype.install=function(a){a=a||window;a.google_js_reporting_queue=a.google_js_reporting_queue||[]};var L=/^(?:([^:/?#.]+):)?(?:\\/\\/(?:([^/?#]*)@)?([^/#?]*?)(?::([0-9]+))?(?=[/#?]|$))?([^?#]+)?(?:\\?([^#]*))?(?:#([\\s\\S]*))?$/,M=function(a){return a?decodeURI(a):a};var O=function(){var a=N;try{var b;if(b=!!a&amp;&amp;null!=a.location.href)a:{try{v(a.foo);b=!0;break a}catch(c){}b=!1}return b}catch(c){return!1}};var P=document,Q=window;var R=!!window.google_async_iframe_id,N=R&amp;&amp;window.parent||window;(new K).install(function(){if(R&amp;&amp;!O()){var a=&quot;.&quot;+P.domain;try{for(;2<a.split(&quot;.&quot;).length&amp;&amp;!O();)P.domain=a=a.substr(a.indexOf(&quot;.&quot;)+1),N=window.parent}catch(b){}O()||(N=window)}return N}());var U=function(a,b,c,d,t,n,f,g,ia){S(P.hidden)?(this.h=&quot;hidden&quot;,this.j=&quot;visibilitychange&quot;):S(P.mozHidden)?(this.h=&quot;mozHidden&quot;,this.j=&quot;mozvisibilitychange&quot;):S(P.msHidden)?(this.h=&quot;msHidden&quot;,this.j=&quot;msvisibilitychange&quot;):S(P.webkitHidden)&amp;&amp;(this.h=&quot;webkitHidden&quot;,this.j=&quot;webkitvisibilitychange&quot;);this.o=!1;this.g=a;this.i=-1;this.s=b;this.u=c;this.I=d;this.F=n;this.A=f?&quot;mousedown&quot;:&quot;click&quot;;t&amp;&amp;P[this.h]&amp;&amp;T(this,2);this.G=g;this.D=ia||0;this.v=this.B=this.l=this.w=null;a=k(this.H,this);J(P,this.j,a);ka(this)};U.prototype.H=function(){if(P[this.h])this.o&amp;&amp;(this.C(),this.i=l(),T(this,0));else{if(-1!=this.i){var a=l()-this.i;a>this.D&amp;&amp;(this.i=-1,T(this,1,a),null!==this.g&amp;&amp;(this.g.registerFinalizeCallback(k(this.g.fireOnObject,this.g,&quot;attempt_survey_trigger&quot;,[&quot;wfocus&quot;,this.u,this.s,this.l,this.B,this.v,a])),5E3<a&amp;&amp;this.g.fireOnObject(&quot;should_show_thank_you&quot;,{})))}this.F&amp;&amp;T(this,3)}};var ka=function(a){if(null!==a.g){var b=k(function(a,b,c){this.l=b.L().K();this.l||(a=b.J(),this.l=&quot;&quot;+M(a.match(L)[3]||null)+M(a.match(L)[5]||null));this.B=b.creativeConversionUrl();this.v=b.adGroupCreativeId();this.m(c)},a),c=a.A;a.g.forEachAd(function(a){a.forEachNavigationAdPiece(function(d){a.listen(d,c,b)})})}else{var d=k(a.m,a);J(Q,a.A,d)}};U.prototype.m=function(a){this.w=a.button;this.o=!0;a=k(this.C,this);Q.setTimeout(a,5E3)};U.prototype.handleClick=U.prototype.m;U.prototype.C=function(){this.o=!1};var T=function(a,b,c){var d=[&quot;//&quot;,a.I?&quot;googleads.g.doubleclick.net&quot;:&quot;pagead2.googlesyndication.com&quot;,&quot;/pagead/gen_204?id=wfocus&quot;,&quot;&amp;gqid=&quot;+a.s,&quot;&amp;qqid=&quot;+a.u].join(&quot;&quot;);0==b&amp;&amp;(d+=&quot;&amp;return=0&quot;);1==b&amp;&amp;(d+=&quot;&amp;return=1&amp;timeDelta=&quot;+c,a.G&amp;&amp;(d+=&quot;&amp;cbtn=&quot;+a.w));2==b&amp;&amp;(d+=&quot;&amp;bgload=1&quot;);3==b&amp;&amp;(d+=&quot;&amp;fg=1&quot;);Q.google_image_requests||(Q.google_image_requests=[]);a=Q.document.createElement(&quot;img&quot;);a.src=d;Q.google_image_requests.push(a)},S=function(a){return&quot;undefined&quot;!==typeof a};var V=function(a,b,c,d,t,n,f,g){return new U(null,a,b,c,d,t,n,f,g)},W=[&quot;wfocusnhinit&quot;],X=e;W[0]in X||!X.execScript||X.execScript(&quot;var &quot;+W[0]);for(var Y;W.length&amp;&amp;(Y=W.shift());){var Z;if(Z=!W.length)Z=void 0!==V;Z?X[Y]=V:X[Y]?X=X[Y]:X=X[Y]={}};}).call(this);window[\'window_focus_for_click\'] =wfocusnhinit(&quot;WrBPWKfLINGrogPb6a_QCw&quot;,&quot;CPu5xqXf8NACFY2paAodZ5IMVw&quot;,true,true,true,false,false,0);</script><iframe scrolling=&quot;no&quot; frameborder=0 height=0 width=0 src=&quot;https://cm.g.doubleclick.net/push?client=ca-pub-2364138307052397&quot; style=&quot;position:absolute&quot;></iframe><script type=&quot;text/javascript&quot;>(function(){var h=this,aa=function(){},ba=function(a){var b=typeof a;if(&quot;object&quot;==b)if(a){if(a instanceof Array)return&quot;array&quot;;if(a instanceof Object)return b;var c=Object.prototype.toString.call(a);if(&quot;[object Window]&quot;==c)return&quot;object&quot;;if(&quot;[object Array]&quot;==c||&quot;number&quot;==typeof a.length&amp;&amp;&quot;undefined&quot;!=typeof a.splice&amp;&amp;&quot;undefined&quot;!=typeof a.propertyIsEnumerable&amp;&amp;!a.propertyIsEnumerable(&quot;splice&quot;))return&quot;array&quot;;if(&quot;[object Function]&quot;==c||&quot;undefined&quot;!=typeof a.call&amp;&amp;&quot;undefined&quot;!=typeof a.propertyIsEnumerable&amp;&amp;!a.propertyIsEnumerable(&quot;call&quot;))return&quot;function&quot;}else return&quot;null&quot;;else if(&quot;function&quot;==b&amp;&amp;&quot;undefined&quot;==typeof a.call)return&quot;object&quot;;return b},l=function(a){return&quot;string&quot;==typeof a},ca=function(a,b,c){return a.call.apply(a.bind,arguments)},da=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},q=function(a,b,c){q=Function.prototype.bind&amp;&amp;-1!=Function.prototype.bind.toString().indexOf(&quot;native code&quot;)?ca:da;return q.apply(null,arguments)},ea=function(a,b){var c=Array.prototype.slice.call(arguments,1);return function(){var b=c.slice();b.push.apply(b,arguments);return a.apply(this,b)}},r=Date.now||function(){return+new Date},t=function(a,b){a=a.split(&quot;.&quot;);var c=h;a[0]in c||!c.execScript||c.execScript(&quot;var &quot;+a[0]);for(var d;a.length&amp;&amp;(d=a.shift());)a.length||void 0===b?c=c[d]?c[d]:c[d]={}:c[d]=b};var fa=function(a,b,c,d,e){if(e)c=a+(&quot;&amp;&quot;+b+&quot;=&quot;+c);else{var f=&quot;&amp;&quot;+b+&quot;=&quot;,g=a.indexOf(f);0>g?c=a+f+c:(g+=f.length,f=a.indexOf(&quot;&amp;&quot;,g),c=0<=f?a.substring(0,g)+c+a.substring(f):a.substring(0,g)+c)}return 2E3<c.length?void 0!==d?fa(a,b,d,void 0,e):a:c};var ga=function(){var a=/[&amp;\\?#]exk=([^&amp; ]+)/.exec(u.location.href);return a&amp;&amp;2==a.length?a[1]:null};var ha=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\\s\\xa0]+|[\\s\\xa0]+$/g,&quot;&quot;)},ja=function(a,b){var c=0;a=ha(String(a)).split(&quot;.&quot;);b=ha(String(b)).split(&quot;.&quot;);for(var d=Math.max(a.length,b.length),e=0;0==c&amp;&amp;e<d;e++){var f=a[e]||&quot;&quot;,g=b[e]||&quot;&quot;;do{f=/(\\d*)(\\D*)(.*)/.exec(f)||[&quot;&quot;,&quot;&quot;,&quot;&quot;,&quot;&quot;];g=/(\\d*)(\\D*)(.*)/.exec(g)||[&quot;&quot;,&quot;&quot;,&quot;&quot;,&quot;&quot;];if(0==f[0].length&amp;&amp;0==g[0].length)break;c=ia(0==f[1].length?0:parseInt(f[1],10),0==g[1].length?0:parseInt(g[1],10))||ia(0==f[2].length,0==g[2].length)||ia(f[2],g[2]);f=f[3];g=g[3]}while(0==c)}return c},ia=function(a,b){return a<b?-1:a>b?1:0};var ka=Array.prototype.indexOf?function(a,b,c){return Array.prototype.indexOf.call(a,b,c)}:function(a,b,c){c=null==c?0:0>c?Math.max(0,a.length+c):c;if(l(a))return l(b)&amp;&amp;1==b.length?a.indexOf(b,c):-1;for(;c<a.length;c++)if(c in a&amp;&amp;a[c]===b)return c;return-1},la=Array.prototype.forEach?function(a,b,c){Array.prototype.forEach.call(a,b,c)}:function(a,b,c){for(var d=a.length,e=l(a)?a.split(&quot;&quot;):a,f=0;f<d;f++)f in e&amp;&amp;b.call(c,e[f],f,a)},ma=Array.prototype.map?function(a,b,c){return Array.prototype.map.call(a,b,c)}:function(a,b,c){for(var d=a.length,e=Array(d),f=l(a)?a.split(&quot;&quot;):a,g=0;g<d;g++)g in f&amp;&amp;(e[g]=b.call(c,f[g],g,a));return e};var na=function(a,b,c){this.label=a;this.type=4;this.eventId=b;this.value=c};var pa=function(a){this.A=oa();this.enabled=Math.random()<a;this.i=[];this.o={}},oa=h.performance&amp;&amp;h.performance.now?q(h.performance.now,h.performance):r;pa.prototype.install=function(a){a=a||window;a.google_js_reporting_queue=a.google_js_reporting_queue||[];this.i=a.google_js_reporting_queue};pa.prototype.disable=function(){this.i.length=0;this.enabled=!1};var qa=function(a,b,c){var d=oa();c=c();d=oa()-a.A-(d-a.A);if(a.enabled){var e=a.o[b]||0,f=e+1;f>e&amp;&amp;(a.o[b]=f);a.i.push(new na(b,f,d))}return c},sa=function(a,b){return q(function(){for(var c=[],d=0;d<arguments.length;++d)c[d]=arguments[d];return qa(this,a,function(){return b.apply(void 0,c)})},ra)};var ta=function(a,b,c){if(&quot;array&quot;==ba(b))for(var d=0;d<b.length;d++)ta(a,String(b[d]),c);else null!=b&amp;&amp;c.push(&quot;&amp;&quot;,a,&quot;&quot;===b?&quot;&quot;:&quot;=&quot;,encodeURIComponent(String(b)))},ua=function(a,b,c){for(c=c||0;c<b.length;c+=2)ta(b[c],b[c+1],a);return a},ya=function(a,b){var c=2==arguments.length?ua([a],arguments[1],0):ua([a],arguments,1);if(c[1]){var d=c[0],e=d.indexOf(&quot;#&quot;);0<=e&amp;&amp;(c.push(d.substr(e)),c[0]=d=d.substr(0,e));e=d.indexOf(&quot;?&quot;);0>e?c[1]=&quot;?&quot;:e==d.length-1&amp;&amp;(c[1]=void 0)}return c.join(&quot;&quot;)};var za=function(a){za[&quot; &quot;](a);return a};za[&quot; &quot;]=aa;var Ba=function(a,b){var c=Aa;return Object.prototype.hasOwnProperty.call(c,a)?c[a]:c[a]=b(a)};var v=function(a){try{var b;if(b=!!a&amp;&amp;null!=a.location.href)a:{try{za(a.foo);b=!0;break a}catch(c){}b=!1}return b}catch(c){return!1}},Ca=function(a,b){for(var c in a)Object.prototype.hasOwnProperty.call(a,c)&amp;&amp;b.call(void 0,a[c],c,a)},Ea=function(){var a=Da;if(!a)return&quot;&quot;;var b=/.*[&amp;#?]google_debug(=[^&amp;]*)?(&amp;.*)?$/;try{var c=b.exec(decodeURIComponent(a));if(c)return c[1]&amp;&amp;1<c[1].length?c[1].substring(1):&quot;true&quot;}catch(d){}return&quot;&quot;};var Fa=function(a,b){this.B=a;this.C=b},Ga=function(a,b){this.url=a;this.s=!!b;this.depth=null};var Ha=function(){var a=!1;try{var b=Object.defineProperty({},&quot;passive&quot;,{get:function(){a=!0}});window.addEventListener(&quot;test&quot;,null,b)}catch(c){}return a}(),Ia=function(a,b,c,d){a.addEventListener?a.addEventListener(b,c,Ha?d:&quot;boolean&quot;==typeof d?d:d?d.capture||!1:!1):a.attachEvent&amp;&amp;a.attachEvent(&quot;on&quot;+b,c)},Ja=function(a,b,c){a.removeEventListener?a.removeEventListener(b,c,Ha?void 0:!1):a.detachEvent&amp;&amp;a.detachEvent(&quot;on&quot;+b,c)};var Ka=function(a,b,c,d,e){this.u=c||4E3;this.g=a||&quot;&amp;&quot;;this.L=b||&quot;,$&quot;;this.h=void 0!==d?d:&quot;trn&quot;;this.V=e||null;this.m=!1;this.f={};this.R=0;this.c=[]},La=function(a,b){var c={};c[a]=b;return[c]},w=function(a,b,c,d){a.c.push(b);a.f[b]=La(c,d)},Oa=function(a,b,c,d){b=b+&quot;//&quot;+c+d;var e=Ma(a)-d.length-0;if(0>e)return&quot;&quot;;a.c.sort(function(a,b){return a-b});d=null;c=&quot;&quot;;for(var f=0;f<a.c.length;f++)for(var g=a.c[f],k=a.f[g],m=0;m<k.length;m++){if(!e){d=null==d?g:d;break}var p=Na(k[m],a.g,a.L);if(p){p=c+p;if(e>=p.length){e-=p.length;b+=p;c=a.g;break}else a.m&amp;&amp;(c=e,p[c-1]==a.g&amp;&amp;--c,b+=p.substr(0,c),c=a.g,e=0);d=null==d?g:d}}f=&quot;&quot;;a.h&amp;&amp;null!=d&amp;&amp;(f=c+a.h+&quot;=&quot;+(a.V||d));return b+f+&quot;&quot;},Ma=function(a){if(!a.h)return a.u;var b=1,c;for(c in a.f)b=c.length>b?c.length:b;return a.u-a.h.length-b-a.g.length-1},Na=function(a,b,c,d,e){var f=[];Ca(a,function(a,k){(a=Pa(a,b,c,d,e))&amp;&amp;f.push(k+&quot;=&quot;+a)});return f.join(b)},Pa=function(a,b,c,d,e){if(null==a)return&quot;&quot;;b=b||&quot;&amp;&quot;;c=c||&quot;,$&quot;;&quot;string&quot;==typeof c&amp;&amp;(c=c.split(&quot;&quot;));if(a instanceof Array){if(d=d||0,d<c.length){for(var f=[],g=0;g<a.length;g++)f.push(Pa(a[g],b,c,d+1,e));return f.join(c[d])}}else if(&quot;object&quot;==typeof a)return e=e||0,2>e?encodeURIComponent(Na(a,b,c,d,e+1)):&quot;...&quot;;return encodeURIComponent(String(a))};var Ra=function(a,b,c,d,e){if((d?a.U:Math.random())<(e||a.M))try{var f;c instanceof Ka?f=c:(f=new Ka,Ca(c,function(a,b){var c=f,d=c.R++;a=La(b,a);c.c.push(d);c.f[d]=a}));var g=Oa(f,a.T,a.N,a.S+b+&quot;&amp;&quot;);g&amp;&amp;Qa(h,g)}catch(k){}},Qa=function(a,b,c){a.google_image_requests||(a.google_image_requests=[]);var d=a.document.createElement(&quot;img&quot;);if(c){var e=function(a){c(a);Ja(d,&quot;load&quot;,e);Ja(d,&quot;error&quot;,e)};Ia(d,&quot;load&quot;,e);Ia(d,&quot;error&quot;,e)}d.src=b;a.google_image_requests.push(d)};var Sa=function(a,b,c){this.w=a;this.P=b;this.j=c;this.l=null;this.O=this.v;this.D=!1},Ta=function(a,b,c){this.message=a;this.fileName=b||&quot;&quot;;this.lineNumber=c||-1},Va=function(a,b,c){var d;try{d=c()}catch(g){var e=a.j;try{var f=Ua(g),e=a.O.call(a,b,f,void 0,void 0)}catch(k){a.v(&quot;pAR&quot;,k)}if(!e)throw g;}finally{}return d},Wa=function(a,b,c){return function(){for(var d=[],e=0;e<arguments.length;++e)d[e]=arguments[e];return Va(a,b,function(){return c.apply(void 0,d)})}};Sa.prototype.v=function(a,b,c,d,e){try{var f=e||this.P,g=new Ka;g.m=!0;w(g,1,&quot;context&quot;,a);b instanceof Ta||(b=Ua(b));w(g,2,&quot;msg&quot;,b.message.substring(0,512));b.fileName&amp;&amp;w(g,3,&quot;file&quot;,b.fileName);0<b.lineNumber&amp;&amp;w(g,4,&quot;line&quot;,b.lineNumber.toString());b={};if(this.l)try{this.l(b)}catch(X){}if(d)try{d(b)}catch(X){}d=[b];g.c.push(5);g.f[5]=d;var k;e=h;d=[];var m,p=null;do{b=e;v(b)?(m=b.location.href,p=b.document&amp;&amp;b.document.referrer||null):(m=p,p=null);d.push(new Ga(m||&quot;&quot;));try{e=b.parent}catch(X){e=null}}while(e&amp;&amp;b!=e);m=0;for(var n=d.length-1;m<=n;++m)d[m].depth=n-m;b=h;if(b.location&amp;&amp;b.location.ancestorOrigins&amp;&amp;b.location.ancestorOrigins.length==d.length-1)for(m=1;m<d.length;++m){var va=d[m];va.url||(va.url=b.location.ancestorOrigins[m-1]||&quot;&quot;,va.s=!0)}for(var wa=new Ga(h.location.href,!1),xa=d.length-1,n=xa;0<=n;--n){var G=d[n];if(G.url&amp;&amp;!G.s){wa=G;break}}var G=null,kc=d.length&amp;&amp;d[xa].url;0!=wa.depth&amp;&amp;kc&amp;&amp;(G=d[xa]);k=new Fa(wa,G);k.C&amp;&amp;w(g,6,&quot;top&quot;,k.C.url||&quot;&quot;);w(g,7,&quot;url&quot;,k.B.url||&quot;&quot;);Ra(this.w,f,g,this.D,c)}catch(X){try{Ra(this.w,f,{context:&quot;ecmserr&quot;,rctx:a,msg:Xa(X),url:k.B.url},this.D,c)}catch(Sc){}}return this.j};var Ua=function(a){return new Ta(Xa(a),a.fileName,a.lineNumber)},Xa=function(a){var b=a.toString();a.name&amp;&amp;-1==b.indexOf(a.name)&amp;&amp;(b+=&quot;: &quot;+a.name);a.message&amp;&amp;-1==b.indexOf(a.message)&amp;&amp;(b+=&quot;: &quot;+a.message);if(a.stack){a=a.stack;var c=b;try{-1==a.indexOf(c)&amp;&amp;(a=c+&quot;\\n&quot;+a);for(var d;a!=d;)d=a,a=a.replace(/((https?:\\/..*\\/)[^\\/:]*:\\d+(?:.|\\n)*)\\2/,&quot;$1&quot;);b=a.replace(/\\n */g,&quot;\\n&quot;)}catch(e){b=c}}return b};var Ya=function(a,b){for(var c in a)b.call(void 0,a[c],c,a)},Za=function(a,b){return null!==a&amp;&amp;b in a};var x;a:{var $a=h.navigator;if($a){var ab=$a.userAgent;if(ab){x=ab;break a}}x=&quot;&quot;}var y=function(a){return-1!=x.indexOf(a)},bb=function(a){for(var b=/(\\w[\\w ]+)\\/([^\\s]+)\\s*(?:\\((.*?)\\))?/g,c=[],d;d=b.exec(a);)c.push([d[1],d[2],d[3]||void 0]);return c};var cb=function(){return y(&quot;Trident&quot;)||y(&quot;MSIE&quot;)},z=function(){return(y(&quot;Chrome&quot;)||y(&quot;CriOS&quot;))&amp;&amp;!y(&quot;Edge&quot;)},eb=function(){function a(a){var b;a:{b=d;for(var e=a.length,k=l(a)?a.split(&quot;&quot;):a,m=0;m<e;m++)if(m in k&amp;&amp;b.call(void 0,k[m],m,a)){b=m;break a}b=-1}return c[0>b?null:l(a)?a.charAt(b):a[b]]||&quot;&quot;}var b=x;if(cb())return db(b);var b=bb(b),c={};la(b,function(a){c[a[0]]=a[1]});var d=ea(Za,c);return y(&quot;Opera&quot;)?a([&quot;Version&quot;,&quot;Opera&quot;]):y(&quot;Edge&quot;)?a([&quot;Edge&quot;]):z()?a([&quot;Chrome&quot;,&quot;CriOS&quot;]):(b=b[2])&amp;&amp;b[1]||&quot;&quot;},db=function(a){var b=/rv: *([\\d\\.]*)/.exec(a);if(b&amp;&amp;b[1])return b[1];var b=&quot;&quot;,c=/MSIE +([\\d\\.]+)/.exec(a);if(c&amp;&amp;c[1])if(a=/Trident\\/(\\d.\\d)/.exec(a),&quot;7.0&quot;==c[1])if(a&amp;&amp;a[1])switch(a[1]){case &quot;4.0&quot;:b=&quot;8.0&quot;;break;case &quot;5.0&quot;:b=&quot;9.0&quot;;break;case &quot;6.0&quot;:b=&quot;10.0&quot;;break;case &quot;7.0&quot;:b=&quot;11.0&quot;}else b=&quot;7.0&quot;;else b=c[1];return b};var A=function(){return y(&quot;iPhone&quot;)&amp;&amp;!y(&quot;iPod&quot;)&amp;&amp;!y(&quot;iPad&quot;)};var fb=y(&quot;Opera&quot;),B=cb(),gb=y(&quot;Edge&quot;),C=y(&quot;Gecko&quot;)&amp;&amp;!(-1!=x.toLowerCase().indexOf(&quot;webkit&quot;)&amp;&amp;!y(&quot;Edge&quot;))&amp;&amp;!(y(&quot;Trident&quot;)||y(&quot;MSIE&quot;))&amp;&amp;!y(&quot;Edge&quot;),hb=-1!=x.toLowerCase().indexOf(&quot;webkit&quot;)&amp;&amp;!y(&quot;Edge&quot;),ib=y(&quot;Macintosh&quot;),jb=y(&quot;Windows&quot;),kb=y(&quot;Android&quot;),lb=A(),mb=y(&quot;iPad&quot;),nb=y(&quot;iPod&quot;),ob=function(){var a=h.document;return a?a.documentMode:void 0},pb;a:{var qb=&quot;&quot;,rb=function(){var a=x;if(C)return/rv\\:([^\\);]+)(\\)|;)/.exec(a);if(gb)return/Edge\\/([\\d\\.]+)/.exec(a);if(B)return/\\b(?:MSIE|rv)[: ]([^\\);]+)(\\)|;)/.exec(a);if(hb)return/WebKit\\/(\\S+)/.exec(a);if(fb)return/(?:Version)[ \\/]?(\\S+)/.exec(a)}();rb&amp;&amp;(qb=rb?rb[1]:&quot;&quot;);if(B){var sb=ob();if(null!=sb&amp;&amp;sb>parseFloat(qb)){pb=String(sb);break a}}pb=qb}var tb=pb,Aa={},D=function(a){return Ba(a,function(){return 0<=ja(tb,a)})},ub;var vb=h.document;ub=vb&amp;&amp;B?ob()||(&quot;CSS1Compat&quot;==vb.compatMode?parseInt(tb,10):5):void 0;var wb=y(&quot;Firefox&quot;),xb=A()||y(&quot;iPod&quot;),yb=y(&quot;iPad&quot;),zb=y(&quot;Android&quot;)&amp;&amp;!(z()||y(&quot;Firefox&quot;)||y(&quot;Opera&quot;)||y(&quot;Silk&quot;)),Ab=z(),Bb=y(&quot;Safari&quot;)&amp;&amp;!(z()||y(&quot;Coast&quot;)||y(&quot;Opera&quot;)||y(&quot;Edge&quot;)||y(&quot;Silk&quot;)||y(&quot;Android&quot;))&amp;&amp;!(A()||y(&quot;iPad&quot;)||y(&quot;iPod&quot;));var E=function(a,b){this.width=a;this.height=b};E.prototype.clone=function(){return new E(this.width,this.height)};E.prototype.ceil=function(){this.width=Math.ceil(this.width);this.height=Math.ceil(this.height);return this};E.prototype.floor=function(){this.width=Math.floor(this.width);this.height=Math.floor(this.height);return this};E.prototype.round=function(){this.width=Math.round(this.width);this.height=Math.round(this.height);return this};E.prototype.scale=function(a,b){this.width*=a;this.height*=&quot;number&quot;==typeof b?b:a;return this};!C&amp;&amp;!B||B&amp;&amp;9<=Number(ub)||C&amp;&amp;D(&quot;1.9.1&quot;);B&amp;&amp;D(&quot;9&quot;);var F=document,u=window;var Cb=null,H=function(a,b){Qa(a,b,void 0)},Db=function(){if(!F.body)return!1;if(!Cb){var a=F.createElement(&quot;iframe&quot;);a.style.display=&quot;none&quot;;a.id=&quot;anonIframe&quot;;Cb=a;F.body.appendChild(a)}return!0},Eb=!!window.google_async_iframe_id,I=Eb&amp;&amp;window.parent||window;var Fb,ra=new pa(1);Fb=new Sa(new function(){this.T=&quot;http:&quot;===u.location.protocol?&quot;http:&quot;:&quot;https:&quot;;this.N=&quot;pagead2.googlesyndication.com&quot;;this.S=&quot;/pagead/gen_204?id=&quot;;this.M=.01;this.U=Math.random()},&quot;jserror&quot;,!0);ra.install(function(){if(Eb&amp;&amp;!v(I)){var a=&quot;.&quot;+F.domain;try{for(;2<a.split(&quot;.&quot;).length&amp;&amp;!v(I);)F.domain=a=a.substr(a.indexOf(&quot;.&quot;)+1),I=window.parent}catch(b){}v(I)||(I=window)}return I}());var Gb=function(a,b){a=a.toString();return Wa(Fb,a,sa(a,b))},J=function(a,b){return Gb(a.toString(),b)};B&amp;&amp;D(&quot;9&quot;);!hb||D(&quot;528&quot;);C&amp;&amp;D(&quot;1.9b&quot;)||B&amp;&amp;D(&quot;8&quot;)||fb&amp;&amp;D(&quot;9.5&quot;)||hb&amp;&amp;D(&quot;528&quot;);C&amp;&amp;!D(&quot;8&quot;)||B&amp;&amp;D(&quot;9&quot;);var Hb=0,K={},Jb=function(a){var b=K.imageLoadingEnabled;if(null!=b)a(b);else{var c=!1;Ib(function(b,e){delete K[e];c||(c=!0,null!=K.imageLoadingEnabled||(K.imageLoadingEnabled=b),a(b))})}},Ib=function(a){var b=new Image,c,d=&quot;&quot;+Hb++;K[d]=b;b.onload=function(){clearTimeout(c);a(!0,d)};c=setTimeout(function(){a(!1,d)},300);b.src=&quot;data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==&quot;},Kb=function(a){if(a){var b=document.createElement(&quot;OBJECT&quot;);b.data=a;b.width=&quot;1&quot;;b.height=&quot;1&quot;;b.style.visibility=&quot;hidden&quot;;var c=&quot;&quot;+Hb++;K[c]=b;b.onload=b.onerror=function(){delete K[c]};document.body.appendChild(b)}},Lb=function(a){if(a){var b=new Image,c=&quot;&quot;+Hb++;K[c]=b;b.onload=b.onerror=function(){delete K[c]};b.src=a}},Mb=function(a){a&amp;&amp;Jb(function(b){b?Lb(a):Kb(a)})};var Nb={K:&quot;ud=1&quot;,J:&quot;ts=0&quot;,aa:&quot;sc=1&quot;,G:&quot;gz=1&quot;,H:&quot;op=1&quot;,ba:&quot;efp=1&quot;,$:&quot;rda=1&quot;,Y:&quot;dcl=1&quot;,X:&quot;ocy=1&quot;,W:&quot;cvh=1&quot;,F:&quot;co=1&quot;,Z:&quot;mlc=1&quot;,I:&quot;opp=1&quot;};if(F&amp;&amp;F.URL){var Da=F.URL,Ob=!(Da&amp;&amp;0<Ea().length);Fb.j=Ob}var L=function(a,b,c,d){c=Gb((d||&quot;osd_or_lidar::&quot;+b).toString(),c);Ia(a,b,c,{capture:void 0})},Pb=function(a,b,c){if(!(0>=b)){var d=0,e=function(){a();d++;d<b&amp;&amp;u.setTimeout(Gb(c.toString(),e),100)};e()}};var Qb=function(a,b){this.b=a||0;this.a=b||&quot;&quot;},Rb=function(a,b){a.b&amp;&amp;(b[4]=a.b);a.a&amp;&amp;(b[12]=a.a)};Qb.prototype.match=function(a){return(this.b||this.a)&amp;&amp;(a.b||a.a)?this.a||a.a?this.a==a.a:this.b||a.b?this.b==a.b:!1:!1};Qb.prototype.toString=function(){var a=&quot;&quot;+this.b;this.a&amp;&amp;(a+=&quot;-&quot;+this.a);return a};var Sb=function(){var a=M,b=[];a.b&amp;&amp;b.push(&quot;adk=&quot;+a.b);a.a&amp;&amp;b.push(&quot;exk=&quot;+a.a);return b},Tb=function(a){var b=[];Ya(a,function(a,d){d=encodeURIComponent(d);l(a)&amp;&amp;(a=encodeURIComponent(a));b.push(d+&quot;=&quot;+a)});b.push(&quot;24=&quot;+(new Date).getTime());return b.join(&quot;\\n&quot;)},N=0,Ub=0,Vb=function(a,b){var c=0,d=u;try{if(d&amp;&amp;d.Goog_AdSense_getAdAdapterInstance)return d}catch(f){}var e=d.location&amp;&amp;d.location.ancestorOrigins;if(!(void 0===e||e&amp;&amp;e.length))return null;for(;d&amp;&amp;5>c;){try{if(d.google_osd_static_frame)return d}catch(f){}try{if(d.aswift_0&amp;&amp;(!a||d.aswift_0.google_osd_static_frame))return d.aswift_0}catch(f){}c++;d=b?0<d.location.ancestorOrigins.length&amp;&amp;d.location.origin==d.location.ancestorOrigins[0]?d.parent:null:d!=d.parent?d.parent:null}return null},Wb=function(a,b,c,d,e,f,g){g=g||aa;if(10<Ub)u.clearInterval(N),g();else if(++Ub,u.postMessage&amp;&amp;(b.b||b.a)){if(f=Vb(!0,f)){g={};Rb(b,g);g[0]=&quot;goog_request_monitoring&quot;;g[6]=a;g[16]=c;d&amp;&amp;d.length&amp;&amp;(g[17]=d.join(&quot;,&quot;));e&amp;&amp;(g[19]=e);try{var k=Tb(g);f.postMessage(k,&quot;*&quot;)}catch(m){}}}else u.clearInterval(N),g()},Xb=function(a){var b=Vb(!1),c=!b;!b&amp;&amp;u&amp;&amp;(b=u.parent);if(b&amp;&amp;b.postMessage)try{b.postMessage(a,&quot;*&quot;),c&amp;&amp;u.postMessage(a,&quot;*&quot;)}catch(d){}};var O=!1,Yb=function(a){if(a=a.match(/[\\d]+/g))a.length=3};(function(){if(navigator.plugins&amp;&amp;navigator.plugins.length){var a=navigator.plugins[&quot;Shockwave Flash&quot;];if(a&amp;&amp;(O=!0,a.description)){Yb(a.description);return}if(navigator.plugins[&quot;Shockwave Flash 2.0&quot;]){O=!0;return}}if(navigator.mimeTypes&amp;&amp;navigator.mimeTypes.length&amp;&amp;(a=navigator.mimeTypes[&quot;application/x-shockwave-flash&quot;],O=!(!a||!a.enabledPlugin))){Yb(a.enabledPlugin.description);return}try{var b=new ActiveXObject(&quot;ShockwaveFlash.ShockwaveFlash.7&quot;);O=!0;Yb(b.GetVariable(&quot;$version&quot;));return}catch(c){}try{b=new ActiveXObject(&quot;ShockwaveFlash.ShockwaveFlash.6&quot;);O=!0;return}catch(c){}try{b=new ActiveXObject(&quot;ShockwaveFlash.ShockwaveFlash&quot;),O=!0,Yb(b.GetVariable(&quot;$version&quot;))}catch(c){}})();(function(){var a;return jb?(a=/Windows NT ([0-9.]+)/,(a=a.exec(x))?a[1]:&quot;0&quot;):ib?(a=/10[_.][0-9_.]+/,(a=a.exec(x))?a[0].replace(/_/g,&quot;.&quot;):&quot;10&quot;):kb?(a=/Android\\s+([^\\);]+)(\\)|;)/,(a=a.exec(x))?a[1]:&quot;&quot;):lb||mb||nb?(a=/(?:iPhone|CPU)\\s+OS\\s+(\\S+)/,(a=a.exec(x))?a[1].replace(/_/g,&quot;.&quot;):&quot;&quot;):&quot;&quot;})();var P=function(a){return(a=a.exec(x))?a[1]:&quot;&quot;};(function(){if(wb)return P(/Firefox\\/([0-9.]+)/);if(B||gb||fb)return tb;if(Ab)return P(/Chrome\\/([0-9.]+)/);if(Bb&amp;&amp;!(A()||y(&quot;iPad&quot;)||y(&quot;iPod&quot;)))return P(/Version\\/([0-9.]+)/);if(xb||yb){var a=/Version\\/(\\S+).*Mobile\\/(\\S+)/.exec(x);if(a)return a[1]+&quot;.&quot;+a[2]}else if(zb)return(a=P(/Android\\s+([0-9.]+)/))?a:P(/Version\\/([0-9.]+)/);return&quot;&quot;})();var Zb=function(){var a=u;return null!==a&amp;&amp;a.top!=a},ac=function(){var a=Zb(),b=a&amp;&amp;0<=&quot;//tpc.googlesyndication.com&quot;.indexOf(u.location.host);if(a&amp;&amp;u.name&amp;&amp;0==u.name.indexOf(&quot;google_ads_iframe&quot;)||b){var c;a=u||u;try{var d;if(a.document&amp;&amp;!a.document.body)d=new E(-1,-1);else{var e=(a||window).document,f=&quot;CSS1Compat&quot;==e.compatMode?e.documentElement:e.body;d=(new E(f.clientWidth,f.clientHeight)).round()}c=d}catch(g){c=new E(-12245933,-12245933)}return $b(c)}c=(u.document||document).getElementsByTagName(&quot;SCRIPT&quot;);return 0<c.length&amp;&amp;(c=c[c.length-1],c.parentElement&amp;&amp;c.parentElement.id&amp;&amp;0<c.parentElement.id.indexOf(&quot;_ad_container&quot;))?$b(void 0,c.parentElement):null},$b=function(a,b){var c=bc(&quot;IMG&quot;,a,b);return c?c:(c=bc(&quot;IFRAME&quot;,a,b))?c:(a=bc(&quot;OBJECT&quot;,a,b))?a:null},bc=function(a,b,c){var d=document;c=c||d;d=a&amp;&amp;&quot;*&quot;!=a?String(a).toUpperCase():&quot;&quot;;c=c.querySelectorAll&amp;&amp;c.querySelector&amp;&amp;d?c.querySelectorAll(d+&quot;&quot;):c.getElementsByTagName(d||&quot;*&quot;);for(d=0;d<c.length;d++){var e=c[d];if(&quot;OBJECT&quot;==a)a:{var f=e.getAttribute(&quot;height&quot;);if(null!=f&amp;&amp;0<f&amp;&amp;0==e.clientHeight)for(var f=e.children,g=0;g<f.length;g++){var k=f[g];if(&quot;OBJECT&quot;==k.nodeName||&quot;EMBED&quot;==k.nodeName){e=k;break a}}}f=e.clientHeight;g=e.clientWidth;if(k=b)k=new E(g,f),k=Math.abs(b.width-k.width)<.1*b.width&amp;&amp;Math.abs(b.height-k.height)<.1*b.height;if(k||!b&amp;&amp;10<f&amp;&amp;10<g)return e}return null};var Q=0,R=&quot;&quot;,cc=[],S=!1,T=!1,U=!1,dc=!0,ec=!1,fc=!1,gc=!1,hc=!1,ic=!1,jc=!1,lc=0,mc=0,V=0,nc=[],M=null,oc=&quot;&quot;,pc=[],qc=null,rc=[],sc=!1,tc=&quot;&quot;,uc=&quot;&quot;,vc=(new Date).getTime(),wc=!1,xc=&quot;&quot;,yc=!1,zc=[&quot;1&quot;,&quot;0&quot;,&quot;3&quot;],W=0,Y=0,Ac=0,Bc=&quot;&quot;,Cc=!1,Dc=!1,Fc=function(a,b,c){S&amp;&amp;(dc||3!=(c||3)||gc)&amp;&amp;Ec(a,b,!0);if(U||T&amp;&amp;fc)Ec(a,b),T=U=!1},Gc=function(){var a=qc;return a?2!=a():!0},Ec=function(a,b,c){if((b=b||oc)&amp;&amp;!sc&amp;&amp;(2==Y||c)&amp;&amp;Gc()){for(var d=0;d<cc.length;++d){var e=Hc(cc[d],b,c),f=a;ec?Mb(e):H(f,e)}ic=!0;c?S=!1:sc=!0}},Ic=function(a,b){var c=[];a&amp;&amp;c.push(&quot;avi=&quot;+a);b&amp;&amp;c.push(&quot;cid=&quot;+b);return c.length?&quot;//pagead2.googlesyndication.com/activeview?&quot;+c.join(&quot;&amp;&quot;):&quot;//pagead2.googlesyndication.com/activeview&quot;},Hc=function(a,b,c){c=c?&quot;osdim&quot;:U?&quot;osd2&quot;:&quot;osdtos&quot;;a=[a,-1<a.indexOf(&quot;?&quot;)?&quot;&amp;id=&quot;:&quot;?id=&quot;,c];&quot;osd2&quot;==c&amp;&amp;T&amp;&amp;fc&amp;&amp;a.push(&quot;&amp;ts=1&quot;);a.push(&quot;&amp;ti=1&quot;);a.push(&quot;&amp;&quot;,b);a.push(&quot;&amp;uc=&quot;+Ac);wc?a.push(&quot;&amp;tgt=&quot;+xc):a.push(&quot;&amp;tgt=nf&quot;);a.push(&quot;&amp;cl=&quot;+(yc?1:0));jc&amp;&amp;(a.push(&quot;&amp;lop=1&quot;),b=r()-lc,a.push(&quot;&amp;tslp=&quot;+b));b=a.join(&quot;&quot;);for(a=0;a<pc.length;a++){try{var d=pc[a]()}catch(e){}c=&quot;max_length&quot;;2<=d.length&amp;&amp;(3==d.length&amp;&amp;(c=d[2]),b=fa(b,encodeURIComponent(d[0]),encodeURIComponent(d[1]),c))}2E3<b.length&amp;&amp;(b=b.substring(0,2E3));return b},Z=function(a){if(tc){try{var b=fa(tc,&quot;vi&quot;,a);Db()&amp;&amp;H(Cb.contentWindow,b)}catch(c){}0<=ka(zc,a)&amp;&amp;(tc=&quot;&quot;)}},Jc=function(){Z(&quot;-1&quot;)},Lc=function(a){if(a&amp;&amp;a.data&amp;&amp;l(a.data)){var b;var c=a.data;if(l(c)){b={};for(var c=c.split(&quot;\\n&quot;),d=0;d<c.length;d++){var e=c[d].indexOf(&quot;=&quot;);if(!(0>=e)){var f=Number(c[d].substr(0,e)),e=c[d].substr(e+1);switch(f){case 5:case 8:case 11:case 15:case 16:case 18:e=&quot;true&quot;==e;break;case 4:case 7:case 6:case 14:case 20:case 21:case 22:case 23:case 24:case 25:e=Number(e);break;case 3:case 19:if(&quot;function&quot;==ba(decodeURIComponent))try{e=decodeURIComponent(e)}catch(k){throw Error(&quot;Error: URI malformed: &quot;+e);}break;case 17:e=ma(decodeURIComponent(e).split(&quot;,&quot;),Number)}b[f]=e}}b=b[0]?b:null}else b=null;if(b&amp;&amp;(c=new Qb(b[4],b[12]),M&amp;&amp;M.match(c))){for(c=0;c<rc.length;c++)rc[c](b);b&amp;&amp;(c=100*b[25],&quot;number&quot;==typeof c&amp;&amp;!isNaN(c)&amp;&amp;(window.document[&quot;4CGeArbVQ&quot;]=c|0));void 0!=b[18]&amp;&amp;(gc=b[18],gc||2!=V||(V=3,Kc()));Dc&amp;&amp;void 0!=b[7]&amp;&amp;0<b[7]&amp;&amp;(c=u,d=&quot;//pagead2.googlesyndication.com/pagead/gen_204?id=ac_opp&amp;vsblt=&quot;+b[7],R&amp;&amp;(d+=&quot;&amp;avi=&quot;+R),ec?Mb(d):H(c,d),Dc=!1);c=b[0];if(&quot;goog_acknowledge_monitoring&quot;==c)u.clearInterval(N),W=2;else if(&quot;goog_get_mode&quot;==c){W=1;d={};M&amp;&amp;Rb(M,d);d[0]=&quot;goog_provide_mode&quot;;d[6]=Y;d[19]=Bc;d[16]=T;try{var g=Tb(d);a.source.postMessage(g,a.origin)}catch(k){}u.clearInterval(N);W=2}else&quot;goog_update_data&quot;==c?(oc=b[3],++Ac):&quot;goog_image_request&quot;==c&amp;&amp;(Fc(u,b[3]),b[5]||b[11]||Z(&quot;0&quot;));if(&quot;goog_update_data&quot;==c||&quot;goog_image_request&quot;==c)(1==Y||2==Y||S)&amp;&amp;b[5]&amp;&amp;(a=1==b[15]&amp;&amp;&quot;goog_update_data&quot;==c,fc=!0,Z(&quot;1&quot;),uc&amp;&amp;Gc()&amp;&amp;(g=uc,Db()&amp;&amp;H(Cb.contentWindow,g),uc=&quot;&quot;),S&amp;&amp;!a&amp;&amp;(Ec(u,void 0,!0),hc=!0,mc=r()),3==V&amp;&amp;(V=4,Kc()),S||1!=Y||(sc=!0)),(1==Y||2==Y||S)&amp;&amp;b[11]&amp;&amp;(T=!1,Z(&quot;3&quot;),S&amp;&amp;(Ec(u,void 0,!0),1==V&amp;&amp;gc&amp;&amp;(V=2)))}}},Kc=function(){var a=u,b=V;0!=b&amp;&amp;1!=b&amp;&amp;Mc(a,&quot;osdim&quot;,&quot;zas=&quot;+b)},Mc=function(a,b,c){var d=[];R&amp;&amp;d.push(&quot;avi=&quot;+R);d.push(&quot;id=&quot;+b);d.push(&quot;ovr_value=&quot;+Q);jc&amp;&amp;d.push(&quot;lop=1&quot;);M&amp;&amp;(d=d.concat(Sb()));d.push(&quot;tt=&quot;+((new Date).getTime()-vc));d.push(c);a.document&amp;&amp;a.document.referrer&amp;&amp;d.push(&quot;ref=&quot;+encodeURIComponent(a.document.referrer));try{H(a,&quot;//pagead2.googlesyndication.com/pagead/gen_204?&quot;+d.join(&quot;&amp;&quot;))}catch(e){}},Nc=function(){Fc(u);Z(&quot;0&quot;);2>W&amp;&amp;!T&amp;&amp;2==Y&amp;&amp;Mc(u,&quot;osd2&quot;,&quot;hs=&quot;+W)},Oc=function(){var a={};Rb(M,a);a[0]=&quot;goog_dom_content_loaded&quot;;var b=Tb(a);try{Pb(function(){Xb(b)},10,&quot;osd_listener::ldcl_int&quot;)}catch(c){}},Pc=function(){var a={};Rb(M,a);a[0]=&quot;goog_creative_loaded&quot;;var b=Tb(a);Pb(function(){Xb(b)},10,&quot;osd_listener::lcel_int&quot;);yc=!0},Qc=function(a){if(l(a)){a=a.split(&quot;&amp;&quot;);for(var b=a.length-1;0<=b;b--){var c=a[b],d=Nb;c==d.K?(dc=!1,a.splice(b,1)):c==d.G?(V=1,a.splice(b,1)):c==d.J?(T=!1,a.splice(b,1)):c==d.H?(ec=!0,a.splice(b,1)):c==d.F?(Cc=!0,a.splice(b,1)):c==d.I&amp;&amp;(Dc=!0,a.splice(b,1))}Bc=a.join(&quot;&amp;&quot;)}},Rc=function(){if(!wc){var a=ac();a&amp;&amp;(wc=!0,xc=a.tagName,a.complete||a.naturalWidth?Pc():L(a,&quot;load&quot;,Pc,&quot;osd_listener::creative_load&quot;))}};t(&quot;osdlfm&quot;,J(&quot;osd_listener::init&quot;,function(a,b,c,d,e,f,g,k,m,p){Q=a;tc=b;uc=d;S=f;g&amp;&amp;Qc(g);T=f;1==k?nc.push(947190538):2==k?nc.push(947190541):3==k&amp;&amp;nc.push(947190542);M=new Qb(e,ga());L(u,&quot;load&quot;,Jc,&quot;osd_listener::load&quot;);L(u,&quot;message&quot;,Lc,&quot;osd_listener::message&quot;);R=c||&quot;&quot;;cc=[p||Ic(c,m)];L(u,&quot;unload&quot;,Nc,&quot;osd_listener::unload&quot;);var n=u.document;!n.readyState||&quot;complete&quot;!=n.readyState&amp;&amp;&quot;loaded&quot;!=n.readyState?!cb()||0<=ja(eb(),11)?L(n,&quot;DOMContentLoaded&quot;,Oc,&quot;osd_listener::dcl&quot;):L(n,&quot;readystatechange&quot;,function(){&quot;complete&quot;!=n.readyState&amp;&amp;&quot;loaded&quot;!=n.readyState||Oc()},&quot;osd_listener::rsc&quot;):Oc();-1==Q?Y=f?3:1:-2==Q?Y=3:0<Q&amp;&amp;(Y=2,U=!0);T&amp;&amp;!U&amp;&amp;-1==Q&amp;&amp;(Y=2);M&amp;&amp;(M.b||M.a)&amp;&amp;(W=1,N=u.setInterval(Gb(&quot;osd_proto::reqm_int&quot;.toString(),ea(Wb,Y,M,T,nc,Bc,Cc,void 0)),500));Pb(Rc,5,&quot;osd_listener:sfc&quot;)}));t(&quot;osdlac&quot;,J(&quot;osd_listener::lac_ex&quot;,function(a){pc.push(a)}));t(&quot;osdlamrc&quot;,J(&quot;osd_listener::lamrc_ex&quot;,function(a){rc.push(a)}));t(&quot;osdsir&quot;,J(&quot;osd_listener::sir_ex&quot;,Fc));t(&quot;osdacrc&quot;,J(&quot;osd_listener::acrc_ex&quot;,function(a){qc=a}));t(&quot;osdpcls&quot;,J(&quot;osd_listener::acrc_ex&quot;,function(a){if(!a||!Zb()||sc||ic&amp;&amp;!hc)return!1;jc=!0;a=/^(http[s]?:)?\\/\\//.test(a)?a:Ic(a);if(hc){var b=Hc(a,oc,!0),c=r()-mc,b=ya(b,&quot;tsvp&quot;,c),c=u;ec?Mb(b):H(c,b)}cc.push(a);lc=r();return!0}));}).call(this);</script><script type=&quot;text/javascript&quot;>osdlfm(-1,\'\',\'BkBoIWrBPWPukIY3TogPnpLK4BQCXy564hAEAABABOAHIAQngAgDgBAGgBiHSCAUIgGEQAQ\',\'\',1612211856,true,\'ocy\\x3d1\\x26ud\\x3d1\\x26cvh\\x3d1\\x26la\\x3d0\\x26\',3,\'CAASFeRoex0pv6O7LqhyhHDCJWP5YByajw\',\'//pagead2.googlesyndication.com/activeview?avi\\x3dBkBoIWrBPWPukIY3TogPnpLK4BQCXy564hAEAABABOAHIAQngAgDgBAGgBiHSCAUIgGEQAQ\\x26cid\\x3dCAASFeRoex0pv6O7LqhyhHDCJWP5YByajw\');</script><img src=&quot;//www.google.com/ads/measurement/l?ebcid=ALh7CaTn4mWtQjbt2QX7T_0FDJ-QIdGKxEB2imwqFD7UpTDTIMR3YKsj8HYQppuMwrDE0q0SITVfkHFcZq4ppviWwcYOA3vdzw&quot; style=&quot;display:none;&quot;></img><script>if (window.top &amp;&amp; window.top.postMessage) {window.top.postMessage(\'{&quot;googMsgType&quot;:&quot;adpnt&quot;}\',\'*\');}</script><script src=&quot;https://tpc.googlesyndication.com/safeframe/1-0-5/js/ext.js&quot;></script></body></html>{&quot;uid&quot;:2,&quot;hostPeerName&quot;:&quot;https://yourstory.com&quot;,&quot;initialGeometry&quot;:&quot;{\\&quot;windowCoords_t\\&quot;:0,\\&quot;windowCoords_r\\&quot;:1366,\\&quot;windowCoords_b\\&quot;:728,\\&quot;windowCoords_l\\&quot;:0,\\&quot;frameCoords_t\\&quot;:858,\\&quot;frameCoords_r\\&quot;:654.90625,\\&quot;frameCoords_b\\&quot;:1108,\\&quot;frameCoords_l\\&quot;:354.90625,\\&quot;styleZIndex\\&quot;:\\&quot;auto\\&quot;,\\&quot;allowedExpansion_t\\&quot;:458,\\&quot;allowedExpansion_r\\&quot;:694.09375,\\&quot;allowedExpansion_b\\&quot;:0,\\&quot;allowedExpansion_l\\&quot;:354.90625,\\&quot;xInView\\&quot;:1,\\&quot;yInView\\&quot;:0.816}&quot;,&quot;permissions&quot;:&quot;{\\&quot;expandByOverlay\\&quot;:false,\\&quot;expandByPush\\&quot;:false,\\&quot;readCookie\\&quot;:false,\\&quot;writeCookie\\&quot;:false}&quot;,&quot;metadata&quot;:&quot;{\\&quot;shared\\&quot;:{\\&quot;sf_ver\\&quot;:\\&quot;1-0-5\\&quot;,\\&quot;ck_on\\&quot;:1,\\&quot;flash_ver\\&quot;:\\&quot;24.0.0\\&quot;}}&quot;,&quot;reportCreativeGeometry&quot;:false,&quot;isDifferentSourceWindow&quot;:false}" scrolling="no" marginwidth="0" marginheight="0" width="300" height="250" data-is-safeframe="true" style="margin: 0px 0px 15px; padding: 0px; border-width: 0px; border-style: initial; outline: 0px; background: transparent; width: 300px; vertical-align: bottom;"></iframe></div></div></div><p style="margin-top: 30px; margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; font-size: 18px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(48, 48, 48); font-family: &quot;Benton Sans&quot;; text-align: start;">I laughed right back (laughter is my best self-preservation mechanism) – also, it was all I could do. To be honest, I felt a little bit lesser about myself as if I was inferior, not good enough. Later that night, I began questioning myself – what was wrong with me that I hadn’t been able to raise any money when everyone else around me seemed to be making the front page with one round of funding or another?</p>', '2016-12-14 04:00:12', 1, '2016-12-14 04:01:22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbfestival`
--

CREATE TABLE `tblmvbfestival` (
  `fest_id_pk` int(11) NOT NULL,
  `fest_name` varchar(255) NOT NULL,
  `fest_date` date NOT NULL,
  `fest_category` int(11) NOT NULL,
  `fest_createdDate` datetime NOT NULL,
  `fest_createdBy` int(11) NOT NULL,
  `fest_modifiedDate` datetime NOT NULL,
  `fest_modifiedBy` int(11) NOT NULL,
  `fest_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbfestival`
--

INSERT INTO `tblmvbfestival` (`fest_id_pk`, `fest_name`, `fest_date`, `fest_category`, `fest_createdDate`, `fest_createdBy`, `fest_modifiedDate`, `fest_modifiedBy`, `fest_status`) VALUES
(1, 'Diwali', '2016-12-30', 0, '2016-11-29 06:00:27', 1, '2016-11-30 04:29:17', 1, 1),
(2, 'Christmus1', '2016-12-25', 1, '2016-11-29 06:01:00', 1, '2016-12-12 12:06:31', 1, 1),
(3, 'Diwali', '2016-10-20', 1, '2016-12-01 03:47:50', 1, '2016-12-01 03:47:50', 1, 1),
(4, 'Diwali', '2016-10-20', 1, '2016-12-01 03:49:42', 1, '2016-12-01 03:49:42', 1, 1),
(5, 'Diwali Ad', '2017-10-20', 1, '2016-12-01 03:51:50', 1, '2016-12-01 03:51:50', 1, 1),
(6, 'Sankrat', '2017-01-20', 1, '2016-12-01 03:51:50', 1, '2016-12-01 03:51:50', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbfestivallocation`
--

CREATE TABLE `tblmvbfestivallocation` (
  `festl_id_pk` int(11) NOT NULL,
  `festl_festId_fk` int(11) NOT NULL,
  `festl_cityId_fk` int(11) NOT NULL,
  `festl_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbfestivallocation`
--

INSERT INTO `tblmvbfestivallocation` (`festl_id_pk`, `festl_festId_fk`, `festl_cityId_fk`, `festl_status`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 2, 2, 1),
(5, 3, 1, 1),
(6, 3, 2, 1),
(7, 3, 3, 1),
(8, 4, 1, 1),
(9, 4, 2, 1),
(10, 4, 3, 1),
(11, 5, 1, 1),
(12, 5, 2, 1),
(13, 5, 3, 1),
(14, 6, 1, 1),
(15, 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbgroups`
--

CREATE TABLE `tblmvbgroups` (
  `grp_id_pk` int(11) NOT NULL,
  `grp_branchId_fk` int(11) NOT NULL,
  `grp_visitorIds_fk` int(11) NOT NULL,
  `grp_name` text NOT NULL,
  `grp_createdDate` datetime NOT NULL,
  `grp_createdBy` int(11) NOT NULL,
  `grp_modifiedDate` datetime NOT NULL,
  `grp_modifiedBy` int(11) NOT NULL,
  `grp_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbmodules`
--

CREATE TABLE `tblmvbmodules` (
  `mod_id_pk` int(11) NOT NULL,
  `mod_name` varchar(255) NOT NULL,
  `mod_url` varchar(255) NOT NULL,
  `mod_icon` varchar(255) NOT NULL,
  `mod_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbmoreg`
--

CREATE TABLE `tblmvbmoreg` (
  `mreg_id_pk` int(11) NOT NULL,
  `mreg_clientId_fk` int(11) NOT NULL,
  `mreg_no` varchar(45) NOT NULL,
  `mreg_createdDate` datetime NOT NULL,
  `mreg_createdBy` int(11) NOT NULL,
  `mreg_modifiedDate` datetime NOT NULL,
  `mreg_modifiedBy` int(11) NOT NULL,
  `mreg_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbpackagedetails`
--

CREATE TABLE `tblmvbpackagedetails` (
  `pkgd_id_pk` int(11) NOT NULL,
  `pkgd_packId_fk` int(11) NOT NULL,
  `pkgd_smsTemplate` int(11) NOT NULL,
  `pkgd_emailTemplate` int(11) NOT NULL,
  `pkgd_smsBulk` int(11) NOT NULL,
  `pkgd_emailBulk` int(11) NOT NULL,
  `pkgd_customFields` int(11) NOT NULL,
  `pkgd_visitorRecord` int(11) NOT NULL,
  `pkgd_documentSize` int(11) NOT NULL,
  `pkgd_moRegstr` int(11) NOT NULL,
  `pkgd_userMgt` int(11) NOT NULL,
  `pkgd_senderId` int(11) NOT NULL,
  `pkgd_emailSupport` int(11) NOT NULL,
  `pkgd_techlSupport` int(11) NOT NULL,
  `pkgd_scheduleReport` int(11) NOT NULL,
  `pkgd_mobileApp` int(11) NOT NULL,
  `pkgd_addressLebeling` int(11) NOT NULL,
  `pkgd_price` float NOT NULL,
  `pkgd_discount` float NOT NULL,
  `pkgds_tax` float NOT NULL,
  `pkgd_finalPrice` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbpackagedetails`
--

INSERT INTO `tblmvbpackagedetails` (`pkgd_id_pk`, `pkgd_packId_fk`, `pkgd_smsTemplate`, `pkgd_emailTemplate`, `pkgd_smsBulk`, `pkgd_emailBulk`, `pkgd_customFields`, `pkgd_visitorRecord`, `pkgd_documentSize`, `pkgd_moRegstr`, `pkgd_userMgt`, `pkgd_senderId`, `pkgd_emailSupport`, `pkgd_techlSupport`, `pkgd_scheduleReport`, `pkgd_mobileApp`, `pkgd_addressLebeling`, `pkgd_price`, `pkgd_discount`, `pkgds_tax`, `pkgd_finalPrice`) VALUES
(4, 4, 11, 11, 11, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 10, 9, 99),
(2, 5, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 1, 0, 0, 0, 0, 120, 10, 10.8, 118.8),
(7, 6, 12, 12, 12, 12, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 100, 10, 18, 108);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbpackages`
--

CREATE TABLE `tblmvbpackages` (
  `pkg_id_pk` int(11) NOT NULL,
  `pkg_name` varchar(255) NOT NULL,
  `pkg_smsCredit` int(11) NOT NULL,
  `pkg_emailCredit` int(11) NOT NULL,
  `pkg_smsPrice` float NOT NULL,
  `pkg_emailPrice` float NOT NULL,
  `pkg_validity` int(11) NOT NULL,
  `pkg_createdDate` datetime NOT NULL,
  `pkg_createdBy` int(11) NOT NULL,
  `pkg_modifiedDate` datetime NOT NULL,
  `pkg_modifiedBy` int(11) NOT NULL,
  `pkg_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbpackages`
--

INSERT INTO `tblmvbpackages` (`pkg_id_pk`, `pkg_name`, `pkg_smsCredit`, `pkg_emailCredit`, `pkg_smsPrice`, `pkg_emailPrice`, `pkg_validity`, `pkg_createdDate`, `pkg_createdBy`, `pkg_modifiedDate`, `pkg_modifiedBy`, `pkg_status`) VALUES
(1, 'Sppee', 1111, 1111, 1, 11, 11, '2016-12-06 04:53:22', 1, '2016-12-06 04:53:22', 1, 1),
(2, 'Sppee', 1111, 1111, 1, 11, 11, '2016-12-06 04:54:40', 1, '2016-12-06 04:54:40', 1, 1),
(3, 'Sppee', 1111, 1111, 1, 11, 11, '2016-12-06 04:55:17', 1, '2016-12-06 04:55:17', 1, 1),
(4, 'Sppeessdsadsadsa', 1111, 1111, 1, 11, 11, '2016-12-06 04:55:40', 1, '2016-12-07 04:54:41', 1, 1),
(5, 'qqqq', 111, 11, 11, 11, 1, '2016-12-06 05:47:15', 1, '2016-12-06 05:47:15', 1, 1),
(6, 'sdadsadsadasd', 12, 12, 21, 20, 12, '2016-12-06 06:28:48', 1, '2016-12-07 05:25:24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbpackageservice`
--

CREATE TABLE `tblmvbpackageservice` (
  `pkgds_id_pk` int(11) NOT NULL,
  `pkgds_packId_fk` int(11) NOT NULL,
  `pkgds_service` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbpackageservice`
--

INSERT INTO `tblmvbpackageservice` (`pkgds_id_pk`, `pkgds_packId_fk`, `pkgds_service`) VALUES
(1, 1, '11zXdxasz'),
(2, 1, 'assadad'),
(3, 1, 'asdada'),
(4, 2, '11zXdxasz'),
(5, 2, 'assadad'),
(6, 2, 'asdada'),
(7, 3, '11zXdxasz'),
(8, 3, 'assadad'),
(9, 3, 'asdada'),
(24, 4, 'assadad'),
(23, 4, '11zXdxasz'),
(13, 5, 'asA'),
(14, 5, 'AsS'),
(27, 6, 'assa'),
(22, 4, 'asdada');

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbpackagetax`
--

CREATE TABLE `tblmvbpackagetax` (
  `pkgt_id_pk` int(11) NOT NULL,
  `pkgt_pkgId_fk` int(11) NOT NULL,
  `pkgt_taxId_fk` int(11) NOT NULL,
  `pkgt_taxPercent` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbpackagetax`
--

INSERT INTO `tblmvbpackagetax` (`pkgt_id_pk`, `pkgt_pkgId_fk`, `pkgt_taxId_fk`, `pkgt_taxPercent`) VALUES
(1, 2, 2, 10),
(2, 2, 3, 10),
(3, 3, 2, 10),
(4, 3, 3, 10),
(17, 6, 2, 10),
(13, 4, 3, 10),
(7, 5, 2, 10),
(16, 6, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbrenewpackage`
--

CREATE TABLE `tblmvbrenewpackage` (
  `rpkg_id_pk` int(11) NOT NULL,
  `rpkg_packageType` varchar(255) NOT NULL,
  `rpkg_packageName` varchar(255) NOT NULL,
  `rpkg_smsCredit` int(11) NOT NULL,
  `rpkg_smsPrice` float NOT NULL,
  `rpkg_emailCredit` int(11) NOT NULL,
  `rpkg_emailPrice` float NOT NULL,
  `rpkg_validity` int(11) NOT NULL,
  `rpkg_tax` float NOT NULL,
  `rpkg_total` float NOT NULL,
  `rpkg_discount` float NOT NULL,
  `rpkg_finalPrice` float NOT NULL,
  `rpkg_createdBy` int(11) NOT NULL,
  `rpkg_createdDate` datetime NOT NULL,
  `rpkg_modifiedBy` int(11) NOT NULL,
  `rpkg_modifiedDate` datetime NOT NULL,
  `rpkg_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbrenewpackage`
--

INSERT INTO `tblmvbrenewpackage` (`rpkg_id_pk`, `rpkg_packageType`, `rpkg_packageName`, `rpkg_smsCredit`, `rpkg_smsPrice`, `rpkg_emailCredit`, `rpkg_emailPrice`, `rpkg_validity`, `rpkg_tax`, `rpkg_total`, `rpkg_discount`, `rpkg_finalPrice`, `rpkg_createdBy`, `rpkg_createdDate`, `rpkg_modifiedBy`, `rpkg_modifiedDate`, `rpkg_status`) VALUES
(1, 'SMS Recharge', 'aaaa', 0, 111, 0, 111, 0, 0, 1000, 10, 1080, 1, '2016-12-08 05:41:52', 1, '2016-12-08 05:41:52', 1),
(2, 'Email Recharge', 'sdsada id= id= id=', 11, 0, 11, 0, 11, 0, 100, 12, 88, 1, '2016-12-08 06:16:56', 1, '2016-12-09 05:59:17', 1),
(3, 'SMS Recharge', 'Sppeesadasdsadsads idsadadsads id=', 11111, 111, 11111, 111, 111, 0, 100, 10, 100.26, 1, '2016-12-08 06:22:22', 1, '2016-12-09 05:58:58', 1),
(4, 'validity', 'dssdsad', 0, 0, 0, 0, 0, 0, 10, 0, 11, 1, '2016-12-08 06:22:44', 1, '2016-12-08 06:22:44', 1),
(5, 'Email Recharge', 'Zxzxzxzxz id=', 3, 4, 4, 3, 0, 0, 10, 1, 12.87, 1, '2016-12-09 02:23:17', 1, '2016-12-09 05:59:27', 1),
(6, 'validity', 'zcZczczZCZczczcz', 6, 24114, 12424, 2421410, 7, 0, 11111, 1, 12099.9, 1, '2016-12-09 02:24:22', 1, '2016-12-09 02:24:22', 1),
(7, 'Basic', 'SADCSADDSAD', 23213, 0, 8, 4, 2341, 0, 1212, 1, 1319.87, 1, '2016-12-09 02:55:58', 1, '2016-12-09 02:55:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbrenewpackagetax`
--

CREATE TABLE `tblmvbrenewpackagetax` (
  `rpkgt_id_pk` int(11) NOT NULL,
  `rpkgt_rpackId_fk` int(11) NOT NULL,
  `rpkgt_taxId_fk` int(11) NOT NULL,
  `rpkgt_taxIdpercent` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbrenewpackagetax`
--

INSERT INTO `tblmvbrenewpackagetax` (`rpkgt_id_pk`, `rpkgt_rpackId_fk`, `rpkgt_taxId_fk`, `rpkgt_taxIdpercent`) VALUES
(1, 1, 2, 10),
(2, 1, 3, 10),
(6, 4, 2, 10),
(17, 5, 4, 10),
(16, 5, 3, 10),
(15, 5, 2, 10),
(10, 6, 2, 10),
(11, 7, 2, 10),
(13, 3, 2, 10),
(14, 3, 1, 1.4);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbsenderid`
--

CREATE TABLE `tblmvbsenderid` (
  `sid_id_pk` int(11) NOT NULL,
  `sid_clientId_fk` int(11) NOT NULL,
  `sid_content` varchar(45) NOT NULL,
  `sid_createdDate` datetime NOT NULL,
  `sid_createdBy` varchar(45) NOT NULL,
  `sid_modifiedDate` datetime NOT NULL,
  `sid_modifiedBy` varchar(45) NOT NULL,
  `sid_status` int(11) NOT NULL,
  `sid_adminStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbservice`
--

CREATE TABLE `tblmvbservice` (
  `service_id_pk` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbsmssignature`
--

CREATE TABLE `tblmvbsmssignature` (
  `sig_id_pk` int(11) NOT NULL,
  `sig_clientId_fk` int(11) NOT NULL,
  `sig_content` varchar(45) NOT NULL,
  `sig_createdDate` datetime NOT NULL,
  `sig_createdBy` int(11) NOT NULL,
  `sig_modifiedDate` datetime NOT NULL,
  `sig_modifiedBy` int(11) NOT NULL,
  `sig_status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbstate`
--

CREATE TABLE `tblmvbstate` (
  `stat_id_pk` int(11) NOT NULL,
  `stat_countryId_fk` int(11) NOT NULL,
  `stat_name` varchar(255) NOT NULL,
  `stat_createdDate` datetime NOT NULL,
  `stat_createdBy` int(11) NOT NULL,
  `stat_modifiedDate` datetime NOT NULL,
  `stat_modifiedBy` int(11) NOT NULL,
  `stat_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbstate`
--

INSERT INTO `tblmvbstate` (`stat_id_pk`, `stat_countryId_fk`, `stat_name`, `stat_createdDate`, `stat_createdBy`, `stat_modifiedDate`, `stat_modifiedBy`, `stat_status`) VALUES
(1, 1, 'Maharashtra', '2016-11-25 03:21:14', 1, '2016-11-25 03:21:14', 1, 1),
(2, 1, 'Goa', '2016-11-25 03:49:24', 1, '2016-12-12 11:42:07', 1, 1),
(3, 1, 'Goa', '2016-11-25 03:50:09', 1, '2016-11-25 03:50:09', 1, 1),
(4, 1, 'Goa', '2016-11-25 03:50:50', 1, '2016-11-25 03:50:50', 1, 1),
(5, 1, 'Panjab', '2016-11-25 04:19:25', 1, '2016-11-25 04:19:25', 1, 1),
(6, 1, 'aaa', '2016-11-25 04:28:38', 1, '2016-11-25 04:28:38', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbsubmodules`
--

CREATE TABLE `tblmvbsubmodules` (
  `smod_id_pk` int(11) NOT NULL,
  `smod_moduleId_fk` int(11) NOT NULL,
  `smod_name` varchar(255) NOT NULL,
  `smod_ur` varchar(255) NOT NULL,
  `smod_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbsysmainusers`
--

CREATE TABLE `tblmvbsysmainusers` (
  `sysmu_id_pk` int(11) NOT NULL,
  `sysmu_userTypeId_fk` int(11) NOT NULL,
  `sysmu_email` text CHARACTER SET utf8 NOT NULL,
  `sysmu_password` text CHARACTER SET utf8 NOT NULL,
  `sysmu_mobile` text CHARACTER SET utf8 NOT NULL,
  `sysmu_empid` text NOT NULL,
  `sysmu_location` text NOT NULL,
  `sysmu_username` text NOT NULL,
  `sysmu_description` text NOT NULL,
  `sysmu_createdDate` datetime NOT NULL,
  `sysmu_createdBy` int(11) NOT NULL,
  `sysmu_modifiedDate` datetime NOT NULL,
  `sysmu_modifiedby` int(11) NOT NULL,
  `sysmu_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbsysmainusers`
--

INSERT INTO `tblmvbsysmainusers` (`sysmu_id_pk`, `sysmu_userTypeId_fk`, `sysmu_email`, `sysmu_password`, `sysmu_mobile`, `sysmu_empid`, `sysmu_location`, `sysmu_username`, `sysmu_description`, `sysmu_createdDate`, `sysmu_createdBy`, `sysmu_modifiedDate`, `sysmu_modifiedby`, `sysmu_status`) VALUES
(1, 1, '58401c420f77c8a0fa7d46b24f07104a5e23155832a3efeac46ae8f4aff0a3b16bdf594c384bce5d47ac695cc96d680096a7ed943a5f700821fa7fd8760b2bb8K0L74epDVU4d4e3eJGwW36tBi8G9oxPgr0RW8xh2fDk3EYcs9zbjG01g7IgME3O8', '4a0a5ac9b067b484b4f89ac40c8611963ea969346146911dd12260ca037e3950342ecf09515afb482f0b387606de9f9c055f288cf1c69ed30b44a663fec4c641zqHo5ldWwHHYEyYsiZUalsBeBlhD8hCL8vx6aoiSYD0=', 'eccec9f93384bf28e77e0ede4879600dfebb253601a056d497b37e8483d0ed179fedc0c914066f79c0ff71aab73ab5b89f32d74f9c0add29e27b4b054685e50b4IJO2B9JbA+5YA3ugPBZ4bHMJ9fK4fNjHG4swH0vcaA=', 'EMP00011', '2', 'Mahesh Kore', 'Hellosdsdsa', '2016-12-17 10:54:21', 1, '2016-12-19 11:49:22', 1, 1),
(2, 1, '013e93c7330c4282ce73be7c8000073f4dff39d2d296dc024eedc2c39c6dac2ad5a21f2e09ac49a6e932273e7ba523ea8636e591b6dae9902e5eefd3ceeee387K6qU/ZUxMFlMjzjiNTpK16qiAhZnpBE2+E3q2cGwo8rOSJhAzX2a6vEPCQWkku+j', '259fe82dade930eddbeb305e36664ab35b774a275ada6599503ff5d14f1c48fcc2c0bc0703599f593c0b28c70b881e62148a4b719ee41f5864bdfae75d0ff8b92QyZeuTOA44EhqU8AZZUYQubFy3Kw8VOyh4qsunyM+s=', '6a64f86a1ddaf36e5372b53e2c3eec7c0ffc4bf7ce075842e26a5d90e2bf15f9d7fd9af8a0de634863b9f72cb311046337d8905f7b3320dee5d5a8a1c639235d7aaOLtJsZYgRPoFYDkvds7DIScFAIaBz3aRND/R5n+8=', 'Emp001', '2', 'Yash Pathak', 'Dedfmds.,mdfsf,d,dsf', '2016-12-19 12:34:59', 1, '2016-12-19 12:34:59', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbsysmainusertypes`
--

CREATE TABLE `tblmvbsysmainusertypes` (
  `mutyp_id_pk` int(11) NOT NULL,
  `mutyp_userType` text NOT NULL,
  `mutyp_createdDate` datetime NOT NULL,
  `mutyp_createdBy` int(11) NOT NULL,
  `mutyp_modifieddate` datetime NOT NULL,
  `mutyp_modifiedBy` int(11) NOT NULL,
  `mutyp_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbsysmainusertypes`
--

INSERT INTO `tblmvbsysmainusertypes` (`mutyp_id_pk`, `mutyp_userType`, `mutyp_createdDate`, `mutyp_createdBy`, `mutyp_modifieddate`, `mutyp_modifiedBy`, `mutyp_status`) VALUES
(1, 'SuperAdmin', '2016-12-15 00:00:00', 1, '2016-12-14 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbsystemusers`
--

CREATE TABLE `tblmvbsystemusers` (
  `sysu_id_pk` int(11) NOT NULL,
  `sysu_branchId_fk` int(11) NOT NULL,
  `sysu_userTypeId_fk` int(11) NOT NULL,
  `sysu_name` text NOT NULL,
  `sysu_mobile` varchar(20) NOT NULL,
  `sysu_email` varchar(255) NOT NULL,
  `sysu_password` varchar(255) NOT NULL,
  `sysu_countryId_fk` int(11) NOT NULL,
  `sysu_stateId_fk` int(11) NOT NULL,
  `sysu_cityId` int(11) NOT NULL,
  `sysu_address` varchar(255) NOT NULL,
  `sysu_createdDate` datetime NOT NULL,
  `sysu_createdBy` int(11) NOT NULL,
  `sysu_modifiedDate` datetime NOT NULL,
  `sysu_modifiedby` int(11) NOT NULL,
  `sysu_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbsystemusers`
--

INSERT INTO `tblmvbsystemusers` (`sysu_id_pk`, `sysu_branchId_fk`, `sysu_userTypeId_fk`, `sysu_name`, `sysu_mobile`, `sysu_email`, `sysu_password`, `sysu_countryId_fk`, `sysu_stateId_fk`, `sysu_cityId`, `sysu_address`, `sysu_createdDate`, `sysu_createdBy`, `sysu_modifiedDate`, `sysu_modifiedby`, `sysu_status`) VALUES
(1, 0, 0, 'Mahesh', '1234567890', 'mahesh@velociters.com', '123456', 0, 0, 0, '0', '2016-11-18 00:00:00', 0, '2016-11-25 00:00:00', 2, 1),
(2, 0, 0, 'Yash', '0', 'yash@velociters.com', '123456', 0, 0, 0, '0', '2016-11-09 00:00:00', 0, '2016-11-18 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbtax`
--

CREATE TABLE `tblmvbtax` (
  `tax_id_pk` int(11) NOT NULL,
  `tax_name` varchar(255) NOT NULL,
  `tax_validFrom` date NOT NULL,
  `tax_validTo` date NOT NULL,
  `tax_createdBy` int(11) NOT NULL,
  `tax_createdDate` datetime NOT NULL,
  `tax_modifiedBy` int(11) NOT NULL,
  `tax_modifiedDate` datetime NOT NULL,
  `tax_percentValue` float NOT NULL,
  `tax_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmvbtax`
--

INSERT INTO `tblmvbtax` (`tax_id_pk`, `tax_name`, `tax_validFrom`, `tax_validTo`, `tax_createdBy`, `tax_createdDate`, `tax_modifiedBy`, `tax_modifiedDate`, `tax_percentValue`, `tax_status`) VALUES
(1, 'Vat', '2016-12-01', '2016-12-30', 1, '2016-12-02 11:01:43', 1, '2016-12-06 10:27:03', 1.4, 1),
(2, 'Tax', '2016-12-01', '2016-12-30', 1, '2016-12-02 11:44:29', 1, '2016-12-06 10:26:31', 10, 1),
(3, 'Gst', '2016-11-25', '2017-01-27', 1, '2016-12-02 11:44:42', 1, '2016-12-06 10:25:46', 10, 1),
(4, 'Sales', '2016-11-29', '2016-12-30', 1, '2016-12-02 12:28:57', 1, '2016-12-06 10:26:18', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbusertypes`
--

CREATE TABLE `tblmvbusertypes` (
  `utyp_id_pk` int(11) NOT NULL,
  `utyp_userType` text NOT NULL,
  `utyp_createdDate` datetime NOT NULL,
  `utyp_createdBy` int(11) NOT NULL,
  `utyp_modifieddate` datetime NOT NULL,
  `utyp_modifiedBy` int(11) NOT NULL,
  `utyp_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmvbvisitors`
--

CREATE TABLE `tblmvbvisitors` (
  `vis_id_pk` int(11) NOT NULL,
  `vis_branchId_fk` int(11) NOT NULL,
  `vis_title` text NOT NULL,
  `vis_firstName` int(11) NOT NULL,
  `vis_middleName` text NOT NULL,
  `vis_lastName` text NOT NULL,
  `vis_mobile` int(11) NOT NULL,
  `vis_email` varchar(255) NOT NULL,
  `vis_businessCategory` text NOT NULL,
  `vis_businessName` text NOT NULL,
  `vis_countryId_fk` int(11) NOT NULL,
  `vis_stateId_fk` int(11) NOT NULL,
  `vis_cityId_fk` int(11) NOT NULL,
  `vis_address` varchar(255) NOT NULL,
  `vis_zipCode` text NOT NULL,
  `vis_website` text NOT NULL,
  `vis_landline` int(11) NOT NULL,
  `vis_fax` int(11) NOT NULL,
  `vis_dob` date NOT NULL,
  `vis_anniversaryDate` date NOT NULL,
  `vis_note` int(11) NOT NULL,
  `vis_createdDate` datetime NOT NULL,
  `vis_createdBy` longtext NOT NULL,
  `vis_modifiedDate` datetime NOT NULL,
  `vis_modifiedBy` int(11) NOT NULL,
  `vis_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exportotp`
--

CREATE TABLE `tbl_exportotp` (
  `otp_id_pk` int(11) NOT NULL,
  `otp_sysUserId_fk` int(11) NOT NULL,
  `otp_moduleId_fk` int(11) NOT NULL,
  `otp_content` varchar(45) NOT NULL,
  `otp_createddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmvbbranches`
--
ALTER TABLE `tblmvbbranches`
  ADD PRIMARY KEY (`brn_id_pk`),
  ADD KEY `brn_id_pk` (`brn_id_pk`,`brn_clientId_fk`,`brn_countryId_fk`,`brn_stateId_fk`,`brn_cityId_fk`,`brn_parenBranchId_fk`);

--
-- Indexes for table `tblmvbcity`
--
ALTER TABLE `tblmvbcity`
  ADD PRIMARY KEY (`cty_id_pk`),
  ADD KEY `cty_id_pk` (`cty_id_pk`,`cty_countryId_fk`,`cty_stateId_fk`);

--
-- Indexes for table `tblmvbclients`
--
ALTER TABLE `tblmvbclients`
  ADD PRIMARY KEY (`clnt_id_pk`),
  ADD KEY `clnt_id_pk` (`clnt_id_pk`,`clnt_countryId_fk`,`clnt_stateId_fk`,`clnt_cityId_fk`,`clnt_packageId_fk`);

--
-- Indexes for table `tblmvbcountry`
--
ALTER TABLE `tblmvbcountry`
  ADD PRIMARY KEY (`cntr_id_pk`),
  ADD KEY `cntr_id_pk` (`cntr_id_pk`);

--
-- Indexes for table `tblmvbcustomfields`
--
ALTER TABLE `tblmvbcustomfields`
  ADD PRIMARY KEY (`cfi_id_pk`),
  ADD KEY `cfi_id_pk` (`cfi_id_pk`,`cfi_datatypeId_fk`);

--
-- Indexes for table `tblmvbdashboardview`
--
ALTER TABLE `tblmvbdashboardview`
  ADD PRIMARY KEY (`dbv_id_pk`),
  ADD KEY `dbv_id_pk` (`dbv_id_pk`,`dbv_branchId_fk`,`dbv_dshboardViewTypeId_fk`);

--
-- Indexes for table `tblmvbdashboardviewtype`
--
ALTER TABLE `tblmvbdashboardviewtype`
  ADD PRIMARY KEY (`dbvt_id_pk`),
  ADD KEY `dbvt_id_pk` (`dbvt_id_pk`);

--
-- Indexes for table `tblmvbdatatype`
--
ALTER TABLE `tblmvbdatatype`
  ADD PRIMARY KEY (`dat_id_pk`),
  ADD KEY `dat_id_pk` (`dat_id_pk`);

--
-- Indexes for table `tblmvbemailtemplate`
--
ALTER TABLE `tblmvbemailtemplate`
  ADD PRIMARY KEY (`email_id_pk`);

--
-- Indexes for table `tblmvbfaqmanagement`
--
ALTER TABLE `tblmvbfaqmanagement`
  ADD PRIMARY KEY (`faq_id_pk`);

--
-- Indexes for table `tblmvbfestival`
--
ALTER TABLE `tblmvbfestival`
  ADD PRIMARY KEY (`fest_id_pk`);

--
-- Indexes for table `tblmvbfestivallocation`
--
ALTER TABLE `tblmvbfestivallocation`
  ADD PRIMARY KEY (`festl_id_pk`),
  ADD KEY `festl_festId_fk` (`festl_festId_fk`),
  ADD KEY `festl_cityId_fk` (`festl_cityId_fk`);

--
-- Indexes for table `tblmvbgroups`
--
ALTER TABLE `tblmvbgroups`
  ADD PRIMARY KEY (`grp_id_pk`),
  ADD KEY `grp_id_pk` (`grp_id_pk`,`grp_branchId_fk`,`grp_visitorIds_fk`);

--
-- Indexes for table `tblmvbmodules`
--
ALTER TABLE `tblmvbmodules`
  ADD PRIMARY KEY (`mod_id_pk`),
  ADD KEY `mod_id_pk` (`mod_id_pk`);

--
-- Indexes for table `tblmvbmoreg`
--
ALTER TABLE `tblmvbmoreg`
  ADD PRIMARY KEY (`mreg_id_pk`),
  ADD KEY `mreg_id_pk` (`mreg_id_pk`,`mreg_clientId_fk`);

--
-- Indexes for table `tblmvbpackagedetails`
--
ALTER TABLE `tblmvbpackagedetails`
  ADD PRIMARY KEY (`pkgd_id_pk`);

--
-- Indexes for table `tblmvbpackages`
--
ALTER TABLE `tblmvbpackages`
  ADD PRIMARY KEY (`pkg_id_pk`),
  ADD KEY `pkg_id_pk` (`pkg_id_pk`);

--
-- Indexes for table `tblmvbpackageservice`
--
ALTER TABLE `tblmvbpackageservice`
  ADD PRIMARY KEY (`pkgds_id_pk`);

--
-- Indexes for table `tblmvbpackagetax`
--
ALTER TABLE `tblmvbpackagetax`
  ADD PRIMARY KEY (`pkgt_id_pk`);

--
-- Indexes for table `tblmvbrenewpackage`
--
ALTER TABLE `tblmvbrenewpackage`
  ADD PRIMARY KEY (`rpkg_id_pk`);

--
-- Indexes for table `tblmvbrenewpackagetax`
--
ALTER TABLE `tblmvbrenewpackagetax`
  ADD PRIMARY KEY (`rpkgt_id_pk`);

--
-- Indexes for table `tblmvbsenderid`
--
ALTER TABLE `tblmvbsenderid`
  ADD PRIMARY KEY (`sid_id_pk`);

--
-- Indexes for table `tblmvbservice`
--
ALTER TABLE `tblmvbservice`
  ADD PRIMARY KEY (`service_id_pk`);

--
-- Indexes for table `tblmvbsmssignature`
--
ALTER TABLE `tblmvbsmssignature`
  ADD PRIMARY KEY (`sig_id_pk`),
  ADD KEY `sig_id_pk` (`sig_id_pk`,`sig_clientId_fk`);

--
-- Indexes for table `tblmvbstate`
--
ALTER TABLE `tblmvbstate`
  ADD PRIMARY KEY (`stat_id_pk`),
  ADD KEY `stat_id_pk` (`stat_id_pk`,`stat_countryId_fk`);

--
-- Indexes for table `tblmvbsubmodules`
--
ALTER TABLE `tblmvbsubmodules`
  ADD PRIMARY KEY (`smod_id_pk`),
  ADD KEY `smod_id_pk` (`smod_id_pk`,`smod_moduleId_fk`);

--
-- Indexes for table `tblmvbsysmainusers`
--
ALTER TABLE `tblmvbsysmainusers`
  ADD PRIMARY KEY (`sysmu_id_pk`),
  ADD KEY `sysmu_id_pk` (`sysmu_id_pk`,`sysmu_userTypeId_fk`);

--
-- Indexes for table `tblmvbsysmainusertypes`
--
ALTER TABLE `tblmvbsysmainusertypes`
  ADD PRIMARY KEY (`mutyp_id_pk`),
  ADD KEY `utyp_id_pk` (`mutyp_id_pk`);

--
-- Indexes for table `tblmvbsystemusers`
--
ALTER TABLE `tblmvbsystemusers`
  ADD PRIMARY KEY (`sysu_id_pk`),
  ADD KEY `sysu_id_pk` (`sysu_id_pk`,`sysu_branchId_fk`,`sysu_userTypeId_fk`,`sysu_countryId_fk`,`sysu_stateId_fk`);

--
-- Indexes for table `tblmvbtax`
--
ALTER TABLE `tblmvbtax`
  ADD PRIMARY KEY (`tax_id_pk`);

--
-- Indexes for table `tblmvbusertypes`
--
ALTER TABLE `tblmvbusertypes`
  ADD PRIMARY KEY (`utyp_id_pk`),
  ADD KEY `utyp_id_pk` (`utyp_id_pk`);

--
-- Indexes for table `tblmvbvisitors`
--
ALTER TABLE `tblmvbvisitors`
  ADD PRIMARY KEY (`vis_id_pk`),
  ADD KEY `vis_id_pk` (`vis_id_pk`,`vis_branchId_fk`,`vis_countryId_fk`,`vis_stateId_fk`,`vis_cityId_fk`);

--
-- Indexes for table `tbl_exportotp`
--
ALTER TABLE `tbl_exportotp`
  ADD PRIMARY KEY (`otp_id_pk`),
  ADD KEY `otp_id_pk` (`otp_id_pk`,`otp_sysUserId_fk`,`otp_moduleId_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmvbbranches`
--
ALTER TABLE `tblmvbbranches`
  MODIFY `brn_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbcity`
--
ALTER TABLE `tblmvbcity`
  MODIFY `cty_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblmvbclients`
--
ALTER TABLE `tblmvbclients`
  MODIFY `clnt_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbcountry`
--
ALTER TABLE `tblmvbcountry`
  MODIFY `cntr_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblmvbcustomfields`
--
ALTER TABLE `tblmvbcustomfields`
  MODIFY `cfi_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbdashboardview`
--
ALTER TABLE `tblmvbdashboardview`
  MODIFY `dbv_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbdashboardviewtype`
--
ALTER TABLE `tblmvbdashboardviewtype`
  MODIFY `dbvt_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbdatatype`
--
ALTER TABLE `tblmvbdatatype`
  MODIFY `dat_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbemailtemplate`
--
ALTER TABLE `tblmvbemailtemplate`
  MODIFY `email_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblmvbfaqmanagement`
--
ALTER TABLE `tblmvbfaqmanagement`
  MODIFY `faq_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblmvbfestival`
--
ALTER TABLE `tblmvbfestival`
  MODIFY `fest_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblmvbfestivallocation`
--
ALTER TABLE `tblmvbfestivallocation`
  MODIFY `festl_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblmvbgroups`
--
ALTER TABLE `tblmvbgroups`
  MODIFY `grp_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbmodules`
--
ALTER TABLE `tblmvbmodules`
  MODIFY `mod_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbmoreg`
--
ALTER TABLE `tblmvbmoreg`
  MODIFY `mreg_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbpackagedetails`
--
ALTER TABLE `tblmvbpackagedetails`
  MODIFY `pkgd_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblmvbpackages`
--
ALTER TABLE `tblmvbpackages`
  MODIFY `pkg_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblmvbpackageservice`
--
ALTER TABLE `tblmvbpackageservice`
  MODIFY `pkgds_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tblmvbpackagetax`
--
ALTER TABLE `tblmvbpackagetax`
  MODIFY `pkgt_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tblmvbrenewpackage`
--
ALTER TABLE `tblmvbrenewpackage`
  MODIFY `rpkg_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblmvbrenewpackagetax`
--
ALTER TABLE `tblmvbrenewpackagetax`
  MODIFY `rpkgt_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tblmvbsenderid`
--
ALTER TABLE `tblmvbsenderid`
  MODIFY `sid_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbservice`
--
ALTER TABLE `tblmvbservice`
  MODIFY `service_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbsmssignature`
--
ALTER TABLE `tblmvbsmssignature`
  MODIFY `sig_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbstate`
--
ALTER TABLE `tblmvbstate`
  MODIFY `stat_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblmvbsubmodules`
--
ALTER TABLE `tblmvbsubmodules`
  MODIFY `smod_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbsysmainusers`
--
ALTER TABLE `tblmvbsysmainusers`
  MODIFY `sysmu_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblmvbsysmainusertypes`
--
ALTER TABLE `tblmvbsysmainusertypes`
  MODIFY `mutyp_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblmvbsystemusers`
--
ALTER TABLE `tblmvbsystemusers`
  MODIFY `sysu_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblmvbtax`
--
ALTER TABLE `tblmvbtax`
  MODIFY `tax_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblmvbusertypes`
--
ALTER TABLE `tblmvbusertypes`
  MODIFY `utyp_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmvbvisitors`
--
ALTER TABLE `tblmvbvisitors`
  MODIFY `vis_id_pk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_exportotp`
--
ALTER TABLE `tbl_exportotp`
  MODIFY `otp_id_pk` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
