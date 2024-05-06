"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  // ＝＝＝＝＝＝ローディングアニメーション＝＝＝＝＝＝
  var loading = document.querySelector('#loading');
  var body = document.querySelector('#body');
  var loadingSecond = document.querySelector('#loading-second');
  var mvTitle = document.querySelector('.mv__title');
  var mvImgs = document.querySelectorAll('.mv__picture');

  // ページの上部にスクロールする
  setTimeout(function () {
    window.scrollTo({
      top: 0
    });
  }, 500); // 0.5秒後に処理が実行される

  $(function () {
    if ($('.top-mv').length) {
      // 泡のアニメーション
      var bubble = function bubble() {
        var bArray = [];
        //泡のサイズの配列
        var sArray = [4, 6, 8, 10];

        //泡が出る幅の範囲計算
        for (var i = 0; i < $(body).width(); i++) {
          bArray.push(i);
        }

        //配列からランダムに値を出す関数
        function randomValue(arr) {
          return arr[Math.floor(Math.random() * arr.length)];
        }
        function calculateBubbleSize() {
          // 画面幅に基づいて泡のサイズを計算
          var screenWidth = $(body).width();
          var baseSize = screenWidth / 300; // 画面幅に応じて調整
          return baseSize * randomValue(sArray);
        }

        // アニメーションを開始する関数
        function startAnimation() {
          // 泡のアニメーション処理
          var animationInterval = setInterval(function () {
            //画面幅に応じて泡のサイズを選定
            var size = calculateBubbleSize();

            //body内のランダムな場所に泡を配置
            $(body).append('<div class="js-bubble" style="left: ' + randomValue(bArray) + 'px; width: ' + size + 'px; height:' + size + 'px;"></div>');

            //2秒かけて下から上に泡が上るようにし、不透明度を下げる。上まで上った泡は取り除く
            $('.js-bubble').animate({
              'bottom': '100%',
              'opacity': '-=0.7'
            }, 2000, function () {
              $(this).remove();
            });
            //0.1秒ごとに泡を発生させる
          }, 100);

          // 2.3秒後にアニメーションを停止
          setTimeout(function () {
            clearInterval(animationInterval);
          }, 2300);
        }
        // アニメーションを開始
        startAnimation();
      };
      // ローディング画面の後ろがスクロールしないようにする
      body.classList.add('body--opened');
      mvTitle.style.zIndex = "16";
      var tl = gsap.timeline();
      tl.to(loadingSecond, {
        translateY: '-5%',
        duration: 1.2,
        delay: .3
      }).to(loading, {
        display: 'none'
      }).add(function () {
        bubble();
      }, '-=.5').add(function () {
        $(mvTitle).fadeIn(2500);
      }, '+=.4').to(loadingSecond, {
        autoAlpha: 0,
        duration: 2.7
      }, '+=3').to(loadingSecond, {
        display: 'none'
      }, '-=2.7').add(function () {
        mvImgs.forEach(function (mvImg) {
          mvImg.classList.add("mv__picture--animation");
        });
      }, '-=5').add(function () {
        mvTitle.style.zIndex = "15";
      }, '-=1.8').add(function () {
        body.classList.remove("body--opened");
      }, '-=1.8');
    }
  });

  // ＝＝＝＝＝＝headerリンクアニメーション＝＝＝＝＝＝
  document.querySelectorAll('.js-splitText').forEach(function (splitTarget) {
    var headerLink = splitTarget.closest('.header__item');
    var newText = ''; // 生成する要素を格納するための変数
    var spanText = splitTarget.textContent; // ターゲットの中身を取得

    // span要素で文字を囲む
    spanText.split('').forEach(function (_char, index) {
      newText += "<span class=\"char-".concat(index + 1, "\">").concat(_char, "</span>");
    });
    splitTarget.innerHTML = newText; // ターゲットに生成した要素を挿入

    var spans = splitTarget.querySelectorAll('span');
    var activeAnimation;

    // hover時の処理
    headerLink.addEventListener('mouseover', function () {
      // アクティブなアニメーションがあればキャンセル
      if (activeAnimation) {
        activeAnimation.kill();
      }
      activeAnimation = gsap.timeline();
      spans.forEach(function (span, index) {
        activeAnimation.to(span, {
          color: '#34c9c4',
          delay: index * 0.02
        }, 0);
      });
    });

    // hoverを外した時の処理
    headerLink.addEventListener('mouseout', function () {
      // アクティブなアニメーションがあればキャンセル
      if (activeAnimation) {
        activeAnimation.kill();
      }
      activeAnimation = gsap.timeline();
      spans.forEach(function (span, index) {
        activeAnimation.to(span, {
          color: '#04047a',
          delay: (spans.length - 1 - index) * 0.02
        }, 0);
      });
    });
  });

  // ＝＝＝＝＝＝ドロワーメニューのアニメーション＝＝＝＝＝＝
  var header = document.querySelector('#header');
  var drawerMenu = document.querySelector('#drawer');
  function drawerEvent() {
    // ドロワーメニューが開く時
    if (drawerMenu.classList.contains('drawer--opened')) {
      gsap.to(drawerMenu, {
        visibility: 'visible'
      });
      gsap.to(header, {
        background: '#04047a'
      });
      gsap.to(drawerMenu, {
        opacity: 1
      });
      // ドロワーメニューが閉じる時
    } else {
      var tl = gsap.timeline();
      tl.to(drawerMenu, {
        opacity: 0
      }).to(header, {
        background: '#fff'
      }, '<').to(drawerMenu, {
        visibility: 'hidden',
        duration: .1
      });
    }
  }

  // ＝＝＝＝＝＝ハンバーガーメニューをクリックした時の処理＝＝＝＝＝＝
  var hamburger = document.querySelector('#hamburger');
  var pageTopBtn = document.querySelector('#page-top-btn');
  hamburger.addEventListener('click', function () {
    header.classList.toggle('header--opened');
    hamburger.classList.toggle('hamburger--opened');
    drawerMenu.classList.toggle('drawer--opened');
    body.classList.toggle('body--opened');
    drawerEvent();
  });

  // ＝＝＝＝＝＝ドロワーメニューが開いている時に、headerをタップした時の処理＝＝＝＝＝＝
  var headerClickNumber = 0;

  // ドロワーメニューを閉じるための処理
  function closeDrawer() {
    header.classList.remove('header--opened');
    hamburger.classList.remove('hamburger--opened');
    drawerMenu.classList.remove('drawer--opened');
    body.classList.remove('body--opened');
    drawerEvent();
  }
  header.addEventListener('click', function () {
    headerClickNumber++;
    if (drawerMenu.classList.contains('drawer--opened') && headerClickNumber == 1001) {
      closeDrawer();
    }
  });
  hamburger.addEventListener('click', function () {
    setTimeout(function () {
      // headerClickNumberをドロワーメニューが開いている場合は1000に、そうでない場合は0に設定
      headerClickNumber = drawerMenu.classList.contains('drawer--opened') ? 1000 : 0;
    }, 100);
  });
  var drawerLinks = document.querySelectorAll('.drawer a');
  for (var i = 0; i < drawerLinks.length; i++) {
    drawerLinks[i].addEventListener('click', function () {
      headerClickNumber = 0;
    });
  }

  // ＝＝＝＝＝＝ドロワーメニューをクリックしたときの処理＝＝＝＝＝＝
  drawerMenu.addEventListener('click', function () {
    header.classList.remove('header--opened');
    hamburger.classList.remove('hamburger--opened');
    drawerMenu.classList.remove('drawer--opened');
    body.classList.remove('body--opened');
    drawerEvent();
  });

  // ＝＝＝＝＝＝ドロワーメニューのページ内リンクにそれぞれクリックイベントを設定＝＝＝＝＝＝
  for (var _i = 0; _i < drawerLinks.length; _i++) {
    drawerLinks[_i].addEventListener('click', function () {
      header.classList.remove('header--opened');
      drawerMenu.classList.remove('drawer--opened');
      hamburger.classList.remove('hamburger--opened');
      body.classList.remove('body--opened');
      drawerEvent();
    });
  }

  // ＝＝＝＝＝＝画面幅が768px以上になったらドロワーメニューを閉じる＝＝＝＝＝＝
  window.addEventListener('resize', function () {
    if (window.innerWidth >= 768) {
      // 768px以上の場合に実行する処理をここに書く
      if (hamburger.classList.contains('hamburger--opened') == true) {
        header.classList.remove('header--opened');
        hamburger.classList.remove('hamburger--opened');
        drawerMenu.classList.remove('drawer--opened');
        body.classList.remove('body--opened');
      }
      var tl = gsap.timeline();
      tl.to(drawerMenu, {
        opacity: 0
      }).to(header, {
        background: '#fff'
      }, '<').to(drawerMenu, {
        visibility: 'hidden',
        duration: .1
      });
    }
  });

  // ＝＝＝＝＝＝リンクをクリックした時のスクロールをスムーズにする処理＝＝＝＝＝＝
  var pageLinks = document.querySelectorAll('a[href^="#"]');
  pageLinks.forEach(function (link) {
    // ページ内リンクに対する処理
    link.addEventListener('click', function (e) {
      e.preventDefault();
      var targetId = this.getAttribute('href').substring(1);
      var targetElement = document.getElementById(targetId);
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });

  // ＝＝＝＝＝＝別ページの特定箇所に遷移した時のスクロールをスムーズにする処理＝＝＝＝＝＝
  //現在のページURLのハッシュ部分を取得
  var hash = location.hash;

  //ハッシュ部分がある場合の条件分岐
  if (hash) {
    //ページ遷移後のスクロール位置指定
    $("html, body").stop().scrollTop(0);
    //処理を遅らせる
    setTimeout(function () {
      //リンク先を取得
      var target = $(hash),
        //リンク先までの距離を取得
        position = target.offset().top;
      //指定の場所までスムーススクロール
      $("html, body").animate({
        scrollTop: position
      }, 500, "swing");
    });
  }

  // ＝＝＝＝＝＝セクションタイトルのアニメーション＝＝＝＝＝＝
  var initials = document.querySelectorAll('.js-initial');
  initials.forEach(function (initial) {
    var sectionTitleEnglish = initial.parentNode;
    var sectionTitle = sectionTitleEnglish.parentNode;
    var restLetter = initial.nextElementSibling;
    var sectionTitleJapanese = sectionTitle.children[1];
    var tl = gsap.timeline({
      scrollTrigger: {
        trigger: sectionTitle,
        start: "top 90%",
        toggleActions: 'play none none reverse'
      }
    });

    // タイムラインにアニメーションを追加
    tl.to(initial, {
      autoAlpha: 1,
      duration: .5
    });
    tl.to(restLetter, {
      autoAlpha: 1,
      duration: .5
    }, '-=.3');
    tl.to(sectionTitleJapanese, {
      autoAlpha: 1,
      duration: .8
    }, '-=.4');
  });

  // ＝＝＝＝＝＝swiperボタンのアニメーション＝＝＝＝＝＝
  var swiperBtnPrev = document.querySelector('#swiper-button-prev');
  var btnArrowPrev = document.querySelector('#btn-arrow-prev');
  var swiperBtnNext = document.querySelector('#swiper-button-next');
  var btnArrowNext = document.querySelector('#btn-arrow-next');
  $(function () {
    if ($('.campaign__swiper-btn-wrapper').length) {
      // ------prevボタンの処理------
      swiperBtnPrev.addEventListener('mouseenter', function () {
        gsap.to(swiperBtnPrev, {
          backgroundColor: '#04047a'
        });
        btnArrowPrev.classList.add('is-active');
      });
      swiperBtnPrev.addEventListener('mouseout', function () {
        gsap.to(swiperBtnPrev, {
          backgroundColor: '#fff'
        });
        btnArrowPrev.classList.remove('is-active');
      });

      // ------nextボタンの処理------
      swiperBtnNext.addEventListener('mouseenter', function () {
        gsap.to(swiperBtnNext, {
          backgroundColor: '#04047a'
        });
        btnArrowNext.classList.add('is-active');
      });
      swiperBtnNext.addEventListener('mouseout', function () {
        gsap.to(swiperBtnNext, {
          backgroundColor: '#fff'
        });
        btnArrowNext.classList.remove('is-active');
      });
    }
  });

  // ＝＝＝＝＝＝campaignのスライダーの処理＝＝＝＝＝＝
  var campaignSwiper = new Swiper(".js-campaign-swiper", {
    loop: true,
    slidesPerView: 1.26,
    spaceBetween: '6.7%',
    // 前後の矢印
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    breakpoints: {
      // 768px以上の場合
      768: {
        slidesPerView: 3.48,
        spaceBetween: '3.18%',
        speed: 700
      }
    }
  });

  // ＝＝＝＝＝＝information swiper＝＝＝＝＝＝
  var informationSwiper = new Swiper('.js-information-swiper', {
    loop: true,
    effect: "cube",
    //追加(スライダーをキューブ型に
    grabCursor: true,
    //追加(カーソルを掴む動作に
    speed: 1500,
    //追加(スライドスピード
    autoplay: {
      delay: 2000
    },
    pagination: {
      el: '.swiper-pagination'
    }
  });

  // ＝＝＝＝＝＝voice画像アニメーション＝＝＝＝＝＝
  var AnimationImgs = document.querySelectorAll('.js-img-animation');
  AnimationImgs.forEach(function (AnimationImg) {
    var AnimationBg = AnimationImg.parentElement.querySelector('.js-bg-animation');
    var tl = gsap.timeline({
      scrollTrigger: {
        trigger: AnimationImg,
        // トリガーとなる要素を指定
        start: "top bottom" // トリガーが画面のどの位置で開始するか指定
      }
    });

    tl.to(AnimationBg, {
      x: '0%'
    }).to(AnimationImg, {
      autoAlpha: 1
    }).to(AnimationBg, {
      x: '-110%'
    });
  });

  // ＝＝＝＝＝＝price画像アニメーション＝＝＝＝＝＝
  $(function () {
    if ($('#price-animation-img').length) {
      var PriceAnimationImg = document.querySelector('#price-animation-img');
      var PriceAnimationBg = document.querySelector('#price-bg-animation');
      var tl = gsap.timeline({
        scrollTrigger: {
          trigger: PriceAnimationImg,
          // トリガーとなる要素を指定
          start: "top bottom" // トリガーが画面のどの位置で開始するか指定
        }
      });

      tl.to(PriceAnimationBg, {
        x: '0%'
      }).to(PriceAnimationImg, {
        autoAlpha: 1
      }).to(PriceAnimationBg, {
        x: '-110%'
      });
    }
  });

  // ＝＝＝＝＝＝ページトップボタンの処理＝＝＝＝＝＝
  var topBtn = document.querySelector('#top-btn');
  var topBtnFront = document.querySelector('#top-btn__wrapper--front');
  var topBtnBack = document.querySelector('#top-btn__wrapper--back');

  //トップから少しでもスクロールしたら出現
  gsap.to(topBtnFront, {
    autoAlpha: 1,
    scrollTrigger: {
      trigger: header,
      start: '1% top',
      toggleActions: 'play none none reverse'
    }
  });
  gsap.to(topBtnBack, {
    autoAlpha: 1,
    scrollTrigger: {
      trigger: header,
      start: '1% top',
      toggleActions: 'play none none reverse'
    }
  });

  // ボタンのクリックイベントを処理する関数
  function scrollToTop() {
    // ページの上部にスクロールする
    window.scrollTo({
      top: 0,
      behavior: 'smooth' // スムーズなスクロールを有効にする
    });
  }

  // クリックしたらトップまで戻る
  topBtn.addEventListener('click', scrollToTop);

  // ＝＝＝＝＝＝別ページのidに飛んだ時の処理＝＝＝＝＝＝
  document.addEventListener("DOMContentLoaded", function () {
    // ページ内リンクでの#以降の部分を解析する
    var targetId = window.location.hash.substring(1);
    if (targetId) {
      // 対象要素を見つける
      var targetElement = document.getElementById(targetId);
      if (targetElement) {
        // 対象のスクロール位置を計算する（必要に応じて調整）
        var targetScrollPosition = targetElement.offsetTop - 100;

        // 対象の位置までスクロールする
        window.scrollTo({
          top: targetScrollPosition,
          behavior: "smooth" // スムーズなスクロールにする
        });
      }
    }
  });

  // ＝＝＝＝＝＝galleryの画像クリック時の処理＝＝＝＝＝＝
  // モーダル表示イベント
  $(".js-gallery-img").click(function () {
    // まず、クリックした画像の HTML(<img>タグ全体)を#modal内にコピー
    $("#modal").html($(this).prop("outerHTML"));
    body.classList.add('body--opened');
    //そして、fadeInで表示する。
    $("#modal").fadeIn(200);
    return false;
  });

  // モーダル非表示イベント
  // モーダル画像背景 または 拡大画像そのものをクリックで発火
  $("#modal").click(function () {
    body.classList.remove('body--opened');
    // 非表示にする
    $("#modal").fadeOut(200);
    return false;
  });

  // ＝＝＝＝＝＝informationページ タブ＝＝＝＝＝＝
  $(function () {
    //クリックしたときのファンクションをまとめて指定
    $('.js-information-link').click(function () {
      //.index()を使いクリックされたタブが何番目かを調べ、indexという変数に代入します。
      var index = $('.js-information-link').index(this);
      if (index >= 3) {
        index -= 3;
      }

      //コンテンツを一度すべて非表示にし、
      $('.information-card').css('display', 'none');

      //クリックされたタブと同じ順番のコンテンツを表示します。
      $('.information-card').eq(index).fadeIn();

      //タブについているクラスis-activeを消し、
      $('.tab__item').removeClass('is-active');
      var tabItems = document.querySelectorAll('.tab__item');
      //クリックされたタブのみにクラスis-activeをつけます。
      tabItems[index].classList.add('is-active');
    });

    //クリックしたときのファンクションをまとめて指定
    $('.tab__item').click(function () {
      //.index()を使いクリックされたタブが何番目かを調べ、indexという変数に代入。
      var index = $('.tab__item').index(this);

      //コンテンツを一度すべて非表示にし、
      $('.information-card').css('display', 'none');

      //クリックされたタブと同じ順番のコンテンツを表示。
      $('.information-card').eq(index).fadeIn();

      //タブについているクラスis-activeを消し、
      $('.tab__item').removeClass('is-active');

      //クリックされたタブのみにクラスis-activeをつける。
      $(this).addClass('is-active');
    });

    //location.hashで#以下を取得 変数hashに格納
    var hash = location.hash;
    //hashの中に#tab～が存在するか調べる。
    hash = (hash.match(/^#tab\d+$/) || [])[0];

    //hashに要素が存在する場合、hashで取得した文字列（#tab2,#tab3等）から#より後を取得(tab2,tab3)
    if ($(hash).length) {
      var tabname = hash.slice(1);
    } else {
      // 要素が存在しなければtabnameにtab1を代入する
      var tabname = "tab1";
    }
    //コンテンツを一度すべて非表示にし、
    $('.information-card').css('display', 'none');

    //一度タブについているクラスis-activeを消し、
    $('.tab__item').removeClass('is-active');
    var tabno = $('.tab__item#' + tabname).index();

    //クリックされたタブと同じ順番のコンテンツを表示。
    $('.information-card').eq(tabno).fadeIn();

    //クリックされたタブのみにクラスis-activeをつける。
    $('.tab__item').eq(tabno).addClass('is-active');
  });

  // ＝＝＝＝＝＝リンクをクリックした時のスクロールの処理＝＝＝＝＝＝
  var headerHeight = header.getBoundingClientRect().height;
  $(function () {
    $('a[href*="#"]').on('click', function () {
      var scrollSpeed = 400;
      var scrollToTarget = $(this.hash === '#' || '' ? 'html' : this.hash);
      if (!scrollToTarget.length) return;
      var scrollPosition = scrollToTarget.offset().top - headerHeight - 20;
      $('html, body').animate({
        scrollTop: scrollPosition
      }, scrollSpeed, 'swing');
      return false;
    });
  });
  $(function () {
    // 別ページの場合は以下
    var urlHash = location.hash;
    if (urlHash) {
      $('body,html').stop().scrollTop(0);
      setTimeout(function () {
        // ヘッダー固定の場合はヘッダーの高さを数値で入れる、固定でない場合は0
        var target = $(urlHash);
        var position = target.offset().top - headerHeight - 20;
        $('body,html').stop().animate({
          scrollTop: position
        }, 400);
      }, 100);
    }
  });

  // ＝＝＝＝＝＝ブログ詳細ページアコーディオン＝＝＝＝＝＝
  $(function () {
    if ($('.accordion').length) {
      var accordionTitles = document.querySelectorAll('.accordion__title');
      var accordion = document.querySelector('accordion');
      accordionTitles.forEach(function (accordionTitle) {
        var accordionItems = accordionTitle.nextElementSibling;
        accordionTitle.addEventListener('click', function () {
          accordionTitle.classList.toggle('is-open');
          accordionItems.classList.toggle('open');
          if (accordionItems.classList.contains('open')) {
            gsap.to(accordionItems, {
              height: 'auto',
              duration: .3
            });
          } else {
            gsap.to(accordionItems, {
              height: 0,
              duration: .3
            });
          }
        });
      });
    }
  });

  // ＝＝＝＝＝＝faqページアコーディオン＝＝＝＝＝＝
  $(function () {
    if ($('.question-list').length) {
      var title = document.querySelectorAll('.question-list__title');
      var accordion = document.querySelector('.question-list__accordion');
      title.forEach(function (titleEach) {
        var explanation = titleEach.nextElementSibling;
        titleEach.addEventListener('click', function () {
          titleEach.classList.toggle('is-active');
          explanation.classList.toggle('is-active');
        });
      });
    }
  });
});
