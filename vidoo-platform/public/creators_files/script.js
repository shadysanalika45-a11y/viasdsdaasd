(function ($) {
  $(window).on('load', function () {
    if (
      $('.video-with-boxes.appear-animation').length > 0 &&
      $('.video-with-boxes.appear-animation .video-box-div').length > 0
    ) {
      $('.video-with-boxes.appear-animation .video-box-div').css({
        filter: 'none',
      })
      if ($(window).width() > 850) {
        setTimeout(function () {
          $('.video-with-boxes.appear-animation .video-box-div')
            .first()
            .addClass('transform')
          let timeoutTimer = 0
          $(
            '.video-with-boxes.appear-animation .video-box-div:not(:first)',
          ).each(function () {
            let timeoutTimer = parseInt(($(this).index() / 2) * 500)
            let _this = $(this)
            setTimeout(function () {
              _this.addClass('transform')
            })
          }, timeoutTimer)
        })
      }
      $(window).on('resize', function () {
        if ($(window).width() > 850) {
          setTimeout(function () {
            $('.video-with-boxes.appear-animation .video-box-div')
              .first()
              .addClass('transform')
            let timeoutTimer = 0
            $(
              '.video-with-boxes.appear-animation .video-box-div:not(:first)',
            ).each(function () {
              let timeoutTimer = parseInt(($(this).index() / 2) * 500)
              let _this = $(this)
              setTimeout(function () {
                _this.addClass('transform')
              })
            }, timeoutTimer)
          })
        }
      })
    }
  })
  $(document).ready(function () {
    if ($('.video-sound').length > 0) {
      $('.video-sound')
        .off('click.dynamicsoundOnOff')
        .on('click.dynamicsoundOnOff', function () {
          let wrapper = $(this).parent()
          if (wrapper.find('video').length > 0) {
            let video = wrapper.find('video')
            if (wrapper.hasClass('with-sound')) {
              video.prop('muted', true)
              wrapper.removeClass('with-sound')
            } else {
              video.prop('muted', false)
              wrapper.addClass('with-sound')
            }
          }
        })
    }
    function changeSlickHeroSizes(currentIndex) {
      $('.phone-border-slider .phone-slider .slick-slide').removeClass(
        'medium small border',
      )
      let currentSlideIndex = $(
        '.phone-border-slider .phone-slider .slick-slide[data-slick-index="' +
          currentIndex +
          '"]',
      ).attr('data-item-index')
      let current = $(
        '.phone-border-slider .phone-slider .slick-slide[data-item-index="' +
          currentSlideIndex +
          '"]',
      )
      if (typeof currentSlideIndex == 'undefined') {
        current = $('.phone-border-slider .phone-slider .slick-slide.first')
      }
      let prevSlideIndex1 = $(
        '.phone-border-slider .phone-slider .slick-slide[data-slick-index="' +
          (currentIndex - 1) +
          '"]',
      ).attr('data-item-index')
      let prevSlideIndex2 = $(
        '.phone-border-slider .phone-slider .slick-slide[data-slick-index="' +
          (currentIndex - 2) +
          '"]',
      ).attr('data-item-index')
      let nextSlideIndex1 = $(
        '.phone-border-slider .phone-slider .slick-slide[data-slick-index="' +
          (currentIndex + 1) +
          '"]',
      ).attr('data-item-index')
      let nextSlideIndex2 = $(
        '.phone-border-slider .phone-slider .slick-slide[data-slick-index="' +
          (currentIndex + 2) +
          '"]',
      ).attr('data-item-index')
      let prevSlide1 = $(
        '.phone-border-slider .phone-slider .slick-slide[data-item-index="' +
          prevSlideIndex1 +
          '"]',
      )
      let prevSlide2 = $(
        '.phone-border-slider .phone-slider .slick-slide[data-item-index="' +
          prevSlideIndex2 +
          '"]',
      )
      let nextSlide1 = $(
        '.phone-border-slider .phone-slider .slick-slide[data-item-index="' +
          nextSlideIndex1 +
          '"]',
      )
      let nextSlide2 = $(
        '.phone-border-slider .phone-slider .slick-slide[data-item-index="' +
          nextSlideIndex2 +
          '"]',
      )
      prevSlide1.addClass('medium slide-left').removeClass('small slide-right')
      prevSlide2.addClass('small slide-left').removeClass('medium slide-right')
      nextSlide1.addClass('medium slide-right').removeClass('small slide-left')
      nextSlide2.addClass('small slide-right').removeClass('medium slide-left')
      current.removeClass('small medium slide-left slide-right')
      $('.phone-border-slider .phone-slider .slick-slide')
        .not(prevSlide1)
        .not(prevSlide2)
        .not(nextSlide1)
        .not(nextSlide2)
        .not(current)
        .addClass('small')
    }
    function loadRevampVideos(slide) {
      let img = slide.find('img.load-image')
      let videoUrl = slide.data('video-url')
      let posterUrl = slide.data('poster-url')
      let loop = 'loop="true"'
      if ($(window).width() < 801) {
        loop = ''
      }
      if (img.length < 1 || slide.find('video').length > 0) {
        slide
          .find('video.lazy-video')
          .off('ended.revampVideoEnd')
          .on('ended.revampVideoEnd', function () {
            if ($(window).width() < 801) {
              $('.phone-overlay .overlay.right-medium').click()
            }
          })
        return false
      }
      slide
        .find('.slide-wrapper')
        .append(
          `<video class="lazy-video active"playsinline="true"width="100%"style="display: none; object-fit: contain;"` +
            loop +
            `muted="true"preload="auto"poster="` +
            posterUrl +
            `"><source src="` +
            videoUrl +
            `"></video>`,
        )
      if (slide.find('video.lazy-video').length > 0) {
        slide
          .find('video.lazy-video')
          .off('ended.revampVideoEnd')
          .on('ended.revampVideoEnd', function () {
            if ($(window).width() < 801) {
              $('.phone-overlay .overlay.right-medium').click()
            }
          })
        slide.find('video.lazy-video')[0].onloadeddata = function () {
          $(this).show()
          img.remove()
        }
      }
    }
    function homepageCreatorsEvents() {
      $('.creators-visual-item .item-content-top')
        .off('click.homepageLoadCreatorVideo')
        .on('click.homepageLoadCreatorVideo', function (e) {
          if ($(e.target).hasClass('creators-video-sound-block')) {
            return false
          }
          if ($(this).hasClass('loaded')) {
            let video = $(this).find('.lazy-video')
            if ($(this).find('video.lazy-video.ready').length > 0) {
              video.removeClass('ready')
              $(this).removeClass('playing')
              video.get(0).pause()
            } else {
              if (
                $(
                  '.creators-visual-wrapper .creators-visual-item .item-content-top video.lazy-video.ready',
                ).length > 0
              ) {
                $(
                  '.creators-visual-wrapper .creators-visual-item .item-content-top video.lazy-video.ready',
                )
                  .get(0)
                  .pause()
                $(
                  '.creators-visual-wrapper .creators-visual-item .item-content-top video.lazy-video.ready',
                ).removeClass('ready')
                $(
                  '.creators-visual-wrapper .creators-visual-item .item-content-top',
                ).removeClass('playing')
              }
              video.addClass('ready')
              $(this).addClass('playing')
              video.get(0).play()
            }
            return false
          }
          $(
            '.creators-visual-wrapper .creators-visual-item .item-content-top video.lazy-video.ready',
          ).each(function () {
            $(this).removeClass('ready')
            $(this).parent().removeClass('playing')
            $(this).get(0).pause()
          })
          let _this = $(this)
          let image = $(this).find('img.lazy-creator-img')
          let videoUrl = image.data('video-url')
          let poster = image.data('poster-url')
          $(this).addClass('loaded')
          $(this).addClass('playing')
          $(this).addClass('with-sound')
          $(this).append(
            `<video class="lazy-video ready"playsinline="true"width="100%"style="display: none; object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
              poster +
              `"><source src="` +
              videoUrl +
              `"></video>`,
          )
          _this.find('video.lazy-video')[0].onloadeddata = function () {
            $(this)[0].play()
            $(this).show()
            $(this).prop('muted', false)
            image.remove()
          }
        })
      $(
        '#connect-creators-sections .creators-visual-wrapper .creators-visual-item .item-content-top .creators-video-sound-block',
      )
        .off('click.homepageToggleSound')
        .on('click.homepageToggleSound', function () {
          let video = $(this).parent().find('video.lazy-video')
          if ($(this).parent().hasClass('with-sound')) {
            video.prop('muted', true)
          } else {
            video.prop('muted', false)
          }
          $(this).parent().toggleClass('with-sound')
        })
    }
    function muteAllSlides(slides) {
      slides.each(function () {
        $(this).find('video.lazy-video').prop('muted', true)
        $(this).removeClass('with-sound')
      })
    }
    $(window).on('scroll', function () {
      if ($('.phone-border-slider').length > 0) {
        if (!$('.phone-border-slider').isInViewport()) {
          if ($('.phone-border-slider .slide.with-sound').length > 0) {
            $('.phone-overlay .overlay.center').click()
          }
        }
        if ($('#connect-creators-sections #creators-section').length > 0) {
          if (
            !$('#connect-creators-sections #creators-section').isInViewport()
          ) {
            $(
              '#connect-creators-sections .creators-visual-wrapper .creators-visual-item .item-content-top.loaded.playing',
            ).click()
          }
        }
        if ($('#accordion-tabs-section').length > 0) {
          if (!$('#accordion-tabs-section').isInViewport()) {
            if (
              $('#accordion-tabs-section .img-video-div.with-sound').length > 0
            ) {
              $('#accordion-tabs-section .img-video-div.with-sound').click()
            }
            if (
              $('#accordion-tabs-section .mobile-accordion-video.with-sound')
                .length > 0
            ) {
              $(
                '#accordion-tabs-section .mobile-accordion-video.with-sound',
              ).click()
            }
          }
        }
        if ($('#how-it-works-second-section .video-wrapper').length > 0) {
          if (
            !$('#how-it-works-second-section .video-wrapper').isInViewport()
          ) {
            if (
              $('#how-it-works-second-section .video-wrapper.with-sound')
                .length > 0
            ) {
              $(
                '#how-it-works-second-section .video-wrapper.with-sound video',
              ).click()
            }
          }
        }
      }
    })
    if ($('.background-accordion').length > 0) {
      if ($('.background-accordion .arrow-left-accord').length > 0) {
        $(window)
          .off(
            'load.mobileInspirationsAccordionLazyLoad resize.mobileInspirationsAccordionLazyLoad scroll.mobileInspirationsAccordionLazyLoad',
          )
          .on(
            'load.mobileInspirationsAccordionLazyLoad resize.mobileInspirationsAccordionLazyLoad scroll.mobileInspirationsAccordionLazyLoad',
            function (e) {
              if ($(window).width() < 769) {
                let activeID = ''
                if (
                  $('.background-accordion .mobile-accordion-button.active')
                    .length > 0
                ) {
                  activeID = $(
                    '.background-accordion .mobile-accordion-button.active',
                  ).data('id')
                } else {
                  activeID = $('.background-accordion .mobile-accordion-button')
                    .first()
                    .data('id')
                }
                let poster = $(
                  '.background-accordion #' +
                    activeID +
                    ' .mobile-accordion-video img',
                ).attr('src')
                let videoUrl = $(
                  '.background-accordion #' +
                    activeID +
                    ' .mobile-accordion-video img',
                ).data('video-url')
                if (
                  $(
                    '.background-accordion #' +
                      activeID +
                      ' .mobile-accordion-video video',
                  ).length < 1
                ) {
                  $(
                    `<video class="video-player ads-accordion"style="display: none;"poster="` +
                      poster +
                      `"type="video/mp4"autoplay="true"preload="true"muted="true"loop="true"playsinline="true"><source src="` +
                      videoUrl +
                      `"type="video/mp4"></video>`,
                  ).insertAfter(
                    $(
                      '.background-accordion #' +
                        activeID +
                        ' .mobile-accordion-video img',
                    ),
                  )
                }
                $(
                  '.background-accordion #' + activeID + ' .accordion-text-div',
                ).find('video')[0].onloadeddata = function () {
                  $(this)[0].play()
                  $(this).show()
                  $(this).prop('muted', true)
                  $(
                    '.background-accordion #' +
                      activeID +
                      ' .mobile-accordion-video img',
                  ).remove()
                }
                $(window).off(
                  'load.mobileInspirationsAccordionLazyLoad resize.mobileInspirationsAccordionLazyLoad scroll.mobileInspirationsAccordionLazyLoad',
                )
              }
            },
          )
        $(window)
          .off(
            'load.inspirationsAccordionLazyLoad resize.inspirationsAccordionLazyLoad scroll.inspirationsAccordionLazyLoad',
          )
          .on(
            'load.inspirationsAccordionLazyLoad resize.inspirationsAccordionLazyLoad scroll.inspirationsAccordionLazyLoad',
            function (e) {
              if ($('.background-accordion').isInViewport()) {
                if ($(window).width() > 768) {
                  if (
                    $('.background-accordion .tabs-buttons .button-tab.active')
                      .length > 0
                  ) {
                    let activeID = $(
                      '.background-accordion .tabs-buttons .button-tab.active',
                    ).data('id')
                    let poster = $(
                      '.background-accordion #' +
                        activeID +
                        ' .img-video-div img',
                    ).attr('src')
                    let videoUrl = $(
                      '.background-accordion #' +
                        activeID +
                        ' .img-video-div img',
                    ).data('video-url')
                    $(
                      '.background-accordion #' + activeID + ' .img-video-div',
                    ).append(
                      `<video class="video-player ads-accordion"style="display: none;"poster="` +
                        poster +
                        `"type="video/mp4"autoplay="true"preload="true"muted="true"loop="true"playsinline="true"><source src="` +
                        videoUrl +
                        `"type="video/mp4"></video>`,
                    )
                    $(
                      '.background-accordion #' + activeID + ' .img-video-div',
                    ).find('video')[0].onloadeddata = function () {
                      $(this)[0].play()
                      $(this).show()
                      $(this).prop('muted', true)
                      $(
                        '.background-accordion #' +
                          activeID +
                          ' .img-video-div img',
                      ).remove()
                    }
                    $(window).off(
                      'load.inspirationsAccordionLazyLoad resize.inspirationsAccordionLazyLoad scroll.inspirationsAccordionLazyLoad',
                    )
                  }
                }
              }
            },
          )
        $('.background-accordion .tabs-buttons .button-tab')
          .off('click.lazyLoadInpirationsTab')
          .on('click.lazyLoadInpirationsTab', function (e) {
            let activeID = $(this).data('id')
            if (
              $('.background-accordion #' + activeID + ' .img-video-div img')
                .length > 0
            ) {
              let lazyLoadImg = $(
                '.background-accordion #' + activeID + ' .img-video-div img',
              )
              let poster = lazyLoadImg.attr('src')
              let videoUrl = lazyLoadImg.data('video-url')
              $(
                '.background-accordion #' + activeID + ' .img-video-div',
              ).append(
                `<video class="video-player ads-accordion"style="display: none;"poster="` +
                  poster +
                  `"type="video/mp4"autoplay="true"preload="true"muted="true"loop="true"playsinline="true"><source src="` +
                  videoUrl +
                  `"type="video/mp4"></video>`,
              )
              $('.background-accordion #' + activeID + ' .img-video-div').find(
                'video',
              )[0].onloadeddata = function () {
                $(this)[0].play()
                $(this).show()
                $(this).prop('muted', true)
                $(
                  '.background-accordion #' + activeID + ' .img-video-div img',
                ).remove()
              }
            }
            if (
              $('.background-accordion .accordion-tab .video-player').length > 0
            ) {
              $('.background-accordion .accordion-tab .video-player').each(
                function () {
                  $(this).get(0).pause()
                },
              )
              $('.background-accordion #' + activeID + ' .video-player')
                .get(0)
                .play()
            }
          })
        $('.background-accordion .mobile-accordion-button')
          .off('click.mobileAccordionTabLazy')
          .on('click.mobileAccordionTabLazy', function () {
            let activeID = $(this).data('id')
            if (
              $(
                '.background-accordion #' +
                  activeID +
                  ' .mobile-accordion-video img',
              ).length > 0
            ) {
              let lazyLoadImg = $(
                '.background-accordion #' +
                  activeID +
                  ' .mobile-accordion-video img',
              )
              let poster = lazyLoadImg.attr('src')
              let videoUrl = lazyLoadImg.data('video-url')
              if (
                $(
                  '.background-accordion #' +
                    activeID +
                    ' .mobile-accordion-video video',
                ).length < 1
              ) {
                $(
                  `<video class="video-player ads-accordion"style="display: none;"poster="` +
                    poster +
                    `"type="video/mp4"autoplay="true"preload="true"muted="true"loop="true"playsinline="true"><source src="` +
                    videoUrl +
                    `"type="video/mp4"></video>`,
                ).insertAfter(
                  $(
                    '.background-accordion #' +
                      activeID +
                      ' .mobile-accordion-video img',
                  ),
                )
              }
              $(
                '.background-accordion #' + activeID + ' .accordion-text-div',
              ).find('video')[0].onloadeddata = function () {
                $(this)[0].play()
                $(this).show()
                $(this).prop('muted', true)
                $(
                  '.background-accordion #' +
                    activeID +
                    ' .mobile-accordion-video img',
                ).remove()
              }
            }
            if (
              $(
                '.background-accordion .accordion-tab .accordion-inner-div .mobile-accordion-video .video-player',
              ).length > 0
            ) {
              $(
                '.background-accordion .accordion-tab .accordion-inner-div .mobile-accordion-video .video-player',
              ).each(function () {
                $(this).get(0).pause()
              })
              if (!$(this).hasClass('active')) {
                $(
                  '.background-accordion #' +
                    activeID +
                    ' .accordion-inner-div .mobile-accordion-video .video-player',
                )
                  .get(0)
                  .pause()
              } else {
                $(
                  '.background-accordion #' +
                    activeID +
                    ' .accordion-inner-div .mobile-accordion-video .video-player',
                )
                  .get(0)
                  .play()
              }
            }
          })
        $('.background-accordion .accordion-tab .img-video-div')
          .off('click.toggleInspirationAccordionSound')
          .on('click.toggleInspirationAccordionSound', function () {
            if ($(this).find('video').length > 0) {
              if ($(this).hasClass('with-sound')) {
                $(this).removeClass('with-sound')
                $(this).find('video').prop('muted', true)
              } else {
                $(this).addClass('with-sound')
                $(this).find('video').prop('muted', false)
              }
            }
          })
        $(
          '.background-accordion .accordion-tab .accordion-inner-div .mobile-accordion-video',
        )
          .off('click.toggleMobileInspirationsAccordionSound')
          .on('click.toggleMobileInspirationsAccordionSound', function () {
            if ($(this).find('video').length > 0) {
              if ($(this).hasClass('with-sound')) {
                $(this).removeClass('with-sound')
                $(this).find('video').prop('muted', true)
              } else {
                $(this).addClass('with-sound')
                $(this).find('video').prop('muted', false)
              }
            }
          })
        $('.background-accordion .arrow-left-accord')
          .off('click.accordionLeftClick')
          .on('click.accordionLeftClick', function () {
            if ($('.tabs-buttons .button-tab.active').prev().length > 0) {
              $('.tabs-buttons .button-tab.active').prev().click()
            } else {
              $('.tabs-buttons .button-tab').last().click()
            }
          })
      }
      if ($('.background-accordion .arrow-right-accord').length > 0) {
        $('.background-accordion .arrow-right-accord')
          .off('click.accordionRightClick')
          .on('click.accordionRightClick', function () {
            if ($('.tabs-buttons .button-tab.active').next().length > 0) {
              $('.tabs-buttons .button-tab.active').next().click()
            } else {
              $('.tabs-buttons .button-tab').first().click()
            }
          })
      }
    }
    if (
      $('#creators-section').length > 0 &&
      $('#connect-creators-sections').length > 0
    ) {
      homepageCreatorsEvents()
      let imageLoadLength = 0
      let imageLength = $(
        '#creators-section .item-content-top .lazy-creator-img, #creators-section .creators-info-wrapper .creators-avatar img',
      ).length
      if ($('#connect-creators-sections').hasClass('loading-animation')) {
        $(
          '#creators-section .item-content-top .lazy-creator-img, #creators-section .creators-info-wrapper .creators-avatar img',
        ).each(function () {
          if (this.complete) {
            imageLoadLength++
            if (imageLoadLength == imageLength) {
              setTimeout(function () {
                $('#connect-creators-sections').removeClass('loading-animation')
              }, 500)
            }
          } else {
            $(this).on('load', function () {
              imageLoadLength++
              if (imageLoadLength == imageLength) {
                setTimeout(function () {
                  $('#connect-creators-sections').removeClass(
                    'loading-animation',
                  )
                }, 500)
              }
            })
          }
        })
      }
      $(
        '#connect-creators-sections .creators-filter-block .creators-selected-category-block',
      )
        .off('click.homepageMobileFilter')
        .on('click.homepageMobileFilter', function () {
          $('.creators-filter-block .creators-filter-wrapper').slideToggle()
          $(this).find('svg').toggleClass('rotate')
        })
      if (typeof tofCreatorsData !== 'undefined') {
        $('.creators-filter-block .creators-filter-wrapper .creators-item')
          .off('click.homepageLoadIndustry')
          .on('click.homepageLoadIndustry', function () {
            if ($(this).hasClass('active')) {
              return false
            }
            $('.creators-filter-block .creators-item').removeClass('active')
            $(this).addClass('active')
            let filterID = $(this).data('id')
            let activeHtml = $(this).html()
            $(
              '.creators-selected-category-block .creators-item.creators-item-selected',
            ).html(activeHtml)
            $('.creators-visual-wrapper').empty()
            $('.creators-visual-wrapper').append(tofCreatorsData[filterID])
            if (
              $('#creators-section').length > 0 &&
              $('#connect-creators-sections').length > 0
            ) {
              $('#connect-creators-sections').addClass('loading-animation')
              let imageLoadLength = 0
              let imageLength = $(
                '#creators-section .item-content-top .lazy-creator-img, #creators-section .creators-info-wrapper .creators-avatar img',
              ).length
              $(
                '#creators-section .item-content-top .lazy-creator-img, #creators-section .creators-info-wrapper .creators-avatar img',
              ).each(function () {
                if (this.complete) {
                  imageLoadLength++
                  if (imageLoadLength == imageLength) {
                    setTimeout(function () {
                      $('#connect-creators-sections').removeClass(
                        'loading-animation',
                      )
                    }, 500)
                  }
                } else {
                  $(this).on('load', function () {
                    imageLoadLength++
                    if (imageLoadLength == imageLength) {
                      setTimeout(function () {
                        $('#connect-creators-sections').removeClass(
                          'loading-animation',
                        )
                      }, 500)
                    }
                  })
                }
              })
            }
            if ($(window).width() < 801) {
              $('.creators-filter-block .creators-filter-wrapper').slideToggle()
              $(this).find('svg').toggleClass('rotate')
            }
            homepageCreatorsEvents()
          })
      }
    }
    $('.phone-border-hero').on('init', function (event, slick) {
      let slide = $('.phone-border-hero .slick-active.slick-center')
      loadRevampVideos(slide)
      if (slide.find('video.lazy-video').length > 0) {
        slide.find('video.lazy-video').get(0).play()
      }
    })
    if ($('.phone-border-hero').length > 0) {
      $('.phone-border-slider .phone-slider')
        .not('.slick-initialized')
        .slick({
          slidesToShow: 5,
          centerMode: true,
          infinite: true,
          arrows: false,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 3000,
          centerPadding: 0,
          cssEase: 'linear',
          speed: 500,
          variableWidth: false,
          responsive: [
            {
              breakpoint: 801,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                autoplay: false,
              },
            },
            {
              breakpoint: 421,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                autoplay: false,
              },
            },
          ],
        })
      $('.phone-border-slider .phone-overlay .overlay').on(
        'click',
        function () {
          let index = $(this).data('id')
          let activeSlide = $(
            '.phone-border-slider .phone-slider .slide.slick-active.slick-center',
          )
          let activeIndex = activeSlide.data('slick-index')
          let nextIndex = 0
          if ($(this).hasClass('left')) {
            muteAllSlides($('.phone-slider .slide'))
            nextIndex = activeIndex - index
          } else if ($(this).hasClass('right')) {
            muteAllSlides($('.phone-slider .slide'))
            nextIndex = activeIndex + index
          } else {
            if (activeSlide.find('video.lazy-video.active').length > 0) {
              let video = activeSlide.find('video.lazy-video')
              $('.phone-slider .slide')
                .not(activeSlide)
                .each(function () {
                  $(this).find('video.lazy-video').prop('muted', true)
                  $(this).removeClass('with-sound')
                })
              if (activeSlide.hasClass('with-sound')) {
                activeSlide.removeClass('with-sound')
                video.prop('muted', true)
                $('.phone-border-slider .phone-slider').removeClass(
                  'global-sound',
                )
              } else {
                activeSlide.addClass('with-sound')
                video.prop('muted', false)
                $('.phone-border-slider .phone-slider').addClass('global-sound')
              }
            }
            return false
          }
          if (nextIndex == -2) {
            nextIndex = -1
            $('.phone-border-slider .phone-slider').slick(
              'slickGoTo',
              nextIndex,
            )
            setTimeout(function () {
              nextIndex = 8
              let nextEl = $(
                '.phone-border-slider .phone-slider .slide[data-slick-index="' +
                  nextIndex +
                  '"]',
              )
              $('.phone-border-slider .phone-slider').slick(
                'slickGoTo',
                nextIndex,
              )
            }, 500)
            return false
          }
          $('.phone-border-slider .phone-slider').slick('slickGoTo', nextIndex)
        },
      )
      $('.phone-border-slider .phone-overlay .overlay.center').on(
        'mouseenter',
        function () {
          if ($(window).width() < 801) {
            return
          }
          if (window.location.href.indexOf('test-home-page-stable') > -1) {
            $('.phone-border-slider .phone-slider').slick('slickPause')
          }
          $('.phone-border-slider .phone-slider').slick('slickPause')
        },
      )
      $('.phone-border-slider .phone-overlay .overlay.center').on(
        'mouseleave',
        function () {
          if ($(window).width() < 801) {
            return
          }
          if (window.location.href.indexOf('test-home-page-stable') > -1) {
            $('.phone-border-slider .phone-slider').slick('slickPlay')
          }
          $('.phone-border-slider .phone-slider').slick('slickPlay')
        },
      )
      $('.phone-border-slider .phone-slider').on('beforeChange', function (
        event,
        slick,
        currentSlide,
        nextSlide,
      ) {
        $('.phone-overlay .overlay.center').removeClass(
          'meta-overlay tiktok-overlay',
        )
        $('.phone-border-slider .phone-slider .slide').removeClass('show-sound')
        muteAllSlides($('.phone-slider .slide'))
        changeSlickHeroSizes(nextSlide)
        let platform = $(
          '.phone-slider .slide[data-slick-index="' + nextSlide + '"]',
        ).data('platform')
        $('.phone-overlay .overlay.center').addClass(platform)
        $('.phone-border-slider .phone-slider .slide video').each(function () {
          $(this).get(0).pause()
          $(this).get(0).currentTime = 0
        })
      })
      $('.phone-border-slider .phone-slider').on('afterChange', function (
        event,
        slick,
        currentSlide,
      ) {
        let el = $(
          '.phone-border-slider .phone-slider .slide[data-slick-index="' +
            currentSlide +
            '"]',
        )
        loadRevampVideos(el)
        $('.phone-border-slider .phone-slider .slide.medium').addClass('border')
        $('.phone-border-slider .phone-slider .slide.slick-center').addClass(
          'show-sound',
        )
        if (el.find('video.lazy-video').length > 0) {
          if (
            $('.phone-border-slider .phone-slider').hasClass('global-sound')
          ) {
            el.addClass('with-sound')
            el.find('video.lazy-video').prop('muted', false)
          }
          el.find('video.lazy-video').get(0).play()
        }
      })
    }
    if ($('img.dynamic-lazyload-video').length > 0) {
      $('img.dynamic-lazyload-video').each(function (index) {
        let actionName = 'lazyLoadDynamicVideo' + index
        let target = this
        $(window)
          .off(
            'load.' +
              actionName +
              ' resize.' +
              actionName +
              ' scroll.' +
              actionName,
          )
          .on(
            'load.' +
              actionName +
              ' resize.' +
              actionName +
              ' scroll.' +
              actionName,
            function (e) {
              if ($(target).length > 0) {
                if ($(target).isInViewport()) {
                  $(window).off(
                    'load.' +
                      actionName +
                      ' resize.' +
                      actionName +
                      ' scroll.' +
                      actionName,
                  )
                  setTimeout(function () {
                    if (
                      $(target).parent().length < 1 ||
                      $(target).parent().find('video.lazy-video').length > 0
                    ) {
                      return false
                    }
                    let videoUrl = $(target).data('video-url')
                    let posterUrl = $(target).data('poster-url')
                    $(target)
                      .parent()
                      .append(
                        `<video class="lazy-video active"playsinline="true"width="100%"style="display: none; object-fit: contain;"autoplay="true"loop="true"muted="true"preload="auto"poster="` +
                          posterUrl +
                          `"><source src="` +
                          videoUrl +
                          `"></video>`,
                      )
                    if (
                      $(target).parent().find('video.lazy-video').length > 0
                    ) {
                      $(target)
                        .parent()
                        .find(
                          'video.lazy-video',
                        )[0].onloadeddata = function () {
                        if ($(this).siblings('.video-sound').length > 0) {
                          $(this)
                            .off('click')
                            .on('click', function () {
                              if ($(this).parent().hasClass('with-sound')) {
                                $(this).parent().removeClass('with-sound')
                                $(this).prop('muted', true)
                              } else {
                                $(this).parent().addClass('with-sound')
                                $(this).prop('muted', false)
                              }
                            })
                        }
                        $(this).show()
                        $(target).remove()
                      }
                    }
                  }, 100)
                }
              }
            },
          )
      })
    }
    if ($('.video-wrapper.dynamic-resolution-video').length > 0) {
      let videoUrl = ''
      let image = ''
      let poster = ''
      let size = ''
      if ($(window).width() > 640) {
        videoUrl = $('.video-wrapper.dynamic-resolution-video').data(
          'wide-video',
        )
        image = $('.video-wrapper.dynamic-resolution-video .desktop-poster')
        poster = image.attr('src')
        size = 'desktop'
      } else {
        videoUrl = $('.video-wrapper.dynamic-resolution-video').data(
          'narrow-video',
        )
        image = $('.video-wrapper.dynamic-resolution-video .mobile-poster')
        poster = image.attr('src')
        size = 'mobile'
      }
      $('.video-wrapper.dynamic-resolution-video').append(
        `<video class="lazy-video active ` +
          size +
          `"playsinline="true"width="100%"style="display: none; object-fit: contain;"autoplay="true"loop="true"muted="true"preload="auto"poster="` +
          poster +
          `"><source src="` +
          videoUrl +
          `"></video>`,
      )
      $('.video-wrapper.dynamic-resolution-video').find(
        'video.lazy-video',
      )[0].onloadeddata = function () {
        $(this).show()
        image.remove()
      }
      $(window)
        .off('resize.dynamicResolutionVideo')
        .on('resize.dynamicResolutionVideo', function () {
          if ($('.video-wrapper.dynamic-resolution-video video').length > 0) {
            if ($(window).width() > 640) {
              if (
                $('.video-wrapper.dynamic-resolution-video video.mobile')
                  .length > 0
              ) {
                let bigVideo = $(
                  '.video-wrapper.dynamic-resolution-video',
                ).data('wide-video')
                let bigPoster = $(
                  '.video-wrapper.dynamic-resolution-video',
                ).data('wide-poster')
                $('.video-wrapper.dynamic-resolution-video video').attr(
                  'poster',
                  bigPoster,
                )
                $('.video-wrapper.dynamic-resolution-video video').attr(
                  'src',
                  bigVideo,
                )
                $('.video-wrapper.dynamic-resolution-video video')[0].load()
                $('.video-wrapper.dynamic-resolution-video video').addClass(
                  'desktop',
                )
                $('.video-wrapper.dynamic-resolution-video video').removeClass(
                  'mobile',
                )
                if (
                  $('.video-wrapper.dynamic-resolution-video .desktop-poster')
                    .length > 0
                ) {
                  $(
                    '.video-wrapper.dynamic-resolution-video .desktop-poster',
                  ).remove()
                }
              }
            } else {
              if (
                $('.video-wrapper.dynamic-resolution-video video.desktop')
                  .length > 0
              ) {
                let smallVideo = $(
                  '.video-wrapper.dynamic-resolution-video',
                ).data('narrow-video')
                let smallPoster = $(
                  '.video-wrapper.dynamic-resolution-video',
                ).data('narrow-poster')
                $('.video-wrapper.dynamic-resolution-video video').attr(
                  'poster',
                  smallPoster,
                )
                $('.video-wrapper.dynamic-resolution-video video').attr(
                  'src',
                  smallVideo,
                )
                $('.video-wrapper.dynamic-resolution-video video')[0].load()
                $('.video-wrapper.dynamic-resolution-video video').removeClass(
                  'desktop',
                )
                $('.video-wrapper.dynamic-resolution-video video').addClass(
                  'mobile',
                )
                if (
                  $('.video-wrapper.dynamic-resolution-video .mobile-poster')
                    .length > 0
                ) {
                  $(
                    '.video-wrapper.dynamic-resolution-video .mobile-poster',
                  ).remove()
                }
              }
            }
          }
        })
    }
    if (
      $('.custom-btn-options .custom-menu-button.custom-scroll-to').length > 0
    ) {
      $('.custom-btn-options .custom-menu-button.custom-scroll-to')
        .off('click')
        .on('click', function (e) {
          e.preventDefault()
          let loadTarget = $($(this).data('scroll-target'))
          if (loadTarget.length < 1) {
            return false
          }
          $('.mobile_head .close_menu').click()
          $('html, body')
            .stop()
            .animate(
              {
                scrollTop:
                  loadTarget.offset().top -
                  $('.header_billo').outerHeight(true),
              },
              1000,
            )
          return false
        })
    }
    if (
      $('.section-with-video-right .ads-video-div img.video-css-bg').length > 0
    ) {
      $(window)
        .off(
          'load.ppcMofCardVideoLoad resize.ppcMofCardVideoLoad scroll.ppcMofCardVideoLoad',
        )
        .on(
          'load.ppcMofCardVideoLoad resize.ppcMofCardVideoLoad scroll.ppcMofCardVideoLoad',
          function (e) {
            if ($('.section-with-video-right .ads-video-div').isInViewport()) {
              if (
                $('.section-with-video-right .ads-video-div img.video-css-bg')
                  .length > 0
              ) {
                let videoUrl = $(
                  '.section-with-video-right .ads-video-div img.video-css-bg',
                ).data('video-url')
                let posterUrl = $(
                  '.section-with-video-right .ads-video-div img.video-css-bg',
                ).data('poster-url')
                $(window).off(
                  'load.ppcMofCardVideoLoad resize.ppcMofCardVideoLoad scroll.ppcMofCardVideoLoad',
                )
                $('.section-with-video-right .ads-video-div').append(
                  `<video class="lazy-video active"playsinline="true"width="100%"style="display: none; object-fit: contain;"autoplay="true"loop="true"muted="true"preload="auto"poster="` +
                    posterUrl +
                    `"><source src="` +
                    videoUrl +
                    `"></video>`,
                )
                $('.section-with-video-right .ads-video-div').find(
                  'video.lazy-video',
                )[0].onloadeddata = function () {
                  $(this).show()
                  $(
                    '.section-with-video-right .ads-video-div img.video-css-bg',
                  ).remove()
                }
              }
            }
          },
        )
    }
    if ($('.hidden-section-after-pricing').length > 0) {
      $('.hidden-section-after-pricing .more-info-btn-div')
        .children()
        .off('click')
        .on('click', function () {
          $(
            '.hidden-section-after-pricing .hidden-div-for-more-info',
          ).slideToggle()
          $(this).parent().toggleClass('open')
        })
    }
    if (
      $(
        '.discover-the-billo-difference-section .first-div .billo-difference-toggle-div',
      ).length > 0
    ) {
      $(window)
        .off(
          'load.bofCardVideoLoad resize.bofCardVideoLoad scroll.bofCardVideoLoad',
        )
        .on(
          'load.bofCardVideoLoad resize.bofCardVideoLoad scroll.bofCardVideoLoad',
          function (e) {
            if (
              $('.for-responsive-second .six-img-div.tab-img').isInViewport()
            ) {
              if (
                $('.for-responsive-second .six-img-div.tab-img .video-css-bg')
                  .length > 0
              ) {
                let videoUrl = $(
                  '.for-responsive-second .six-img-div.tab-img .video-css-bg',
                ).data('video-url')
                let posterUrl = $(
                  '.for-responsive-second .six-img-div.tab-img .video-css-bg',
                ).data('poster-url')
                $(window).off(
                  'load.bofCardVideoLoad resize.bofCardVideoLoad scroll.bofCardVideoLoad',
                )
                $('.for-responsive-second .six-img-div.tab-img').append(
                  `<video class="lazy-video active"playsinline="true"width="100%"style="display: none; object-fit: contain;"autoplay="true"loop="true"muted="true"preload="auto"poster="` +
                    posterUrl +
                    `"><source src="` +
                    videoUrl +
                    `"></video>`,
                )
                $('.for-responsive-second .six-img-div.tab-img').find(
                  'video.lazy-video',
                )[0].onloadeddata = function () {
                  $(this).show()
                  $(
                    '.for-responsive-second .six-img-div.tab-img .video-css-bg',
                  ).remove()
                }
              }
            }
          },
        )
      $(
        '.billo-difference-toggle-div .billo-difference-name, .billo-difference-toggle-div .when-text-hidden',
      )
        .off('click')
        .on('click', function () {
          let parentEl = $(this).parent()
          if (!$(this).parent().hasClass('open')) {
            $(
              '.discover-the-billo-difference-section .second-div .tab-img',
            ).removeClass('show')
            if (
              $(
                '.discover-the-billo-difference-section .second-div .six-img-div video',
              ).length > 0
            ) {
              $(
                '.discover-the-billo-difference-section .second-div .six-img-div video',
              ).prop('muted', true)
              $(
                '.discover-the-billo-difference-section .second-div .six-img-div',
              ).removeClass('with-sound')
            }
            $(
              '.billo-difference-toggle-div.open .hidden-billo-difference-text',
            ).slideUp()
            $('.billo-difference-toggle-div.open').removeClass('open')
            let id = $(this).parent().data('image')
            let el = $(
              '.discover-the-billo-difference-section .second-div',
            ).find('.tab-img[data-image="' + id + '"]')
            $(
              '.discover-the-billo-difference-section .second-div .tab-img',
            ).removeClass('show')
            if (el.length > 0) {
              el.addClass('show')
              if (el.hasClass('six-img-div')) {
                el.off('click').on('click', function (e) {
                  if (!$(e.currentTarget).hasClass('show')) {
                    return false
                  }
                  let video = $(
                    '.for-responsive-second .six-img-div.tab-img',
                  ).find('.lazy-video')
                  if (video.parent().hasClass('with-sound')) {
                    video.prop('muted', true)
                    video.parent().removeClass('with-sound')
                  } else {
                    video.prop('muted', false)
                    video.parent().addClass('with-sound')
                  }
                })
                el.find('video').get(0).play()
                el.find('video').prop('muted', true)
                el.find('video').parent().removeClass('with-sound')
                el.find('video').get(0).currentTime = 0
              }
            }
            $(this).parent().addClass('open')
            $(this).siblings('.hidden-billo-difference-text').slideDown()
          }
        })
    }
    if ($('body.single-post .imagesingle_post').length > 0) {
      if ($('iframe').length > 0) {
        $('iframe').each(function () {
          if (typeof $(this).attr('src') !== 'undefined') {
            if ($(this).attr('src').indexOf('youtube') > -1) {
              $(this).addClass('youtube-iframe')
              if ($(this).attr('width') && $(this).attr('height')) {
                let width = parseInt($(this).attr('width'))
                let height = parseInt($(this).attr('height'))
                if (width > height) {
                  $(this).addClass('horizontal')
                } else {
                  $(this).addClass('vertical')
                }
              }
            }
          }
        })
      }
    }
    $('.mobile_menu').on('click', function () {
      $(window).trigger('resize')
    })
    $.fn.blogTOC = function (options) {
      var settings = $.extend(
        {
          shorten: false,
          stripAfter: 50,
          scrollSpeed: 400,
          scrollOffset: 0,
          wrapWith: '<div class="toc_container"/>',
          container: 'body',
        },
        options,
      )
      var scrollToHeadline = function (target) {
        $('body, html').animate(
          { scrollTop: $(target).offset().top - settings.scrollOffset },
          settings.scrollSpeed,
          function () {},
        )
      }
      return this.each(function (index1) {
        var toc_container = $(settings.container),
          container = $(this),
          headlines = $('h2', container),
          toc = '<ul class="toc">'
        if (headlines.length == 0) {
          return
        } else {
          $(window).on('resize', function () {
            if ($(settings.container).parents().eq(2).hasClass('mobile')) {
              if ($(window).width() < 851) {
                $(settings.container).parents().eq(2).show()
              } else {
                $(settings.container).parents().eq(2).hide()
              }
            } else {
              if ($(window).width() > 850) {
                $(settings.container).parents().eq(1).show()
              } else {
                $(settings.container).parents().eq(1).hide()
              }
            }
          })
          if ($(settings.container).parents().eq(2).hasClass('mobile')) {
            if ($(window).width() < 851) {
              $(settings.container).parents().eq(2).show()
            }
          } else {
            if ($(window).width() > 850) {
              $(settings.container).parents().eq(1).show()
            }
          }
        }
        var level = headlines[0].tagName.replace(/[^\d]/g, '')
        headlines.each(function (index2, headline) {
          var cLevel = headline.tagName.replace(/[^\d]/g, '')
          var headlineId = 'hl_' + (index1 + 1) + (index2 + 1) + level
          var currentHeadlineHTML = $(headline).html()
          var currentHeadlineText = $(headline).text()
          var shortenedHeadlineText = currentHeadlineText
          if (settings.strip) {
            shortenedHeadlineText =
              shortenedHeadlineText.substring(0, settings.stripAfter) + '...'
          }
          $(this).html('<a id="' + headlineId + '">' + currentHeadlineHTML)
          toc +=
            '<li><a href="#' +
            headlineId +
            '" title="' +
            currentHeadlineText +
            '">' +
            shortenedHeadlineText +
            '</a></li>'
        })
        toc += '</ul>'
        toc_container.append($(toc))
        $('.toc', toc_container).wrap(settings.wrapWith)
        $('li a', $('.toc')).click(function (e) {
          e.preventDefault()
          var target = $(e.target).attr('href')
          scrollToHeadline(target)
        })
      })
    }
    if ($('.blogpost-header').length > 0) {
      $('.mobile_menu').on('click', function () {
        $('html').addClass('no-scroll')
      })
      $('.close_megamenu').on('click', function () {
        $('html').removeClass('no-scroll')
      })
    }
    if ($('.blogpost-sidebar').length > 0) {
      let currUrl = window.location.href.split('#hl_')
      if (typeof currUrl[1] !== 'undefined') {
        setTimeout(function () {
          if ($('#hl_' + currUrl[1]).length > 0) {
            let loadTarget = $('#hl_' + currUrl[1]).first()
            $('html, body')
              .stop()
              .animate({ scrollTop: loadTarget.offset().top - 80 }, 1000)
          }
        }, 500)
      }
      if (
        $('.blog-custom-cta-column').length > 0 &&
        $('.blog-custom-cta-column .blog-custom-cta-wrapper').length > 0
      ) {
        if (
          $('.blog-custom-cta-column .blog-custom-cta-wrapper')
            .children()
            .html().length < 1
        ) {
          $('.blog-custom-cta-column .blog-custom-cta-wrapper')
            .children()
            .html(
              '<div class="fusion-image-element fusion-no-small-visibility" style="--awb-margin-right:20px;--awb-caption-title-size:var(--h2_typography-font-size);--awb-caption-title-transform:var(--h2_typography-text-transform);--awb-caption-title-line-height:var(--h2_typography-line-height);--awb-caption-title-letter-spacing:var(--h2_typography-letter-spacing);"><span class=" fusion-imageframe imageframe-none imageframe-2 hover-type-none blog-custom-cta-image fusion-no-small-visibility" style="border-radius:30px;"><img fetchpriority="high" decoding="async" width="343" height="281" alt="Billo Product Videos for 10x less" title="Group 750" src="https://billo.app/wp-content/uploads/2023/11/Group-750.png" data-orig-src="https://billo.app/wp-content/uploads/2023/11/Group-750.png" class=" img-responsive wp-image-23741 lazyautosizes lazyloading" srcset="https://billo.app/wp-content/uploads/2023/11/Group-750-200x164.png 200w, https://billo.app/wp-content/uploads/2023/11/Group-750.png 343w" data-srcset="https://billo.app/wp-content/uploads/2023/11/Group-750-200x164.png 200w, https://billo.app/wp-content/uploads/2023/11/Group-750.png 343w" data-sizes="auto" data-orig-sizes="(max-width: 640px) 100vw, 343px" sizes="343px"></span></div>',
            )
        }
      }
    }
    if ($('.blogpost-sidebar').not('.mobile').length > 0) {
      $('.blog-toc-sidebar .quick_links .collapse')
        .off('click')
        .on('click', function () {
          if ($(this).parent().hasClass('pre-close')) {
            $(this).parent().removeClass('pre-close')
            $(this).siblings('.toc_container').css({ display: 'none' })
            $(this)
              .siblings('.toc_container')
              .slideDown(function () {})
          } else if ($(this).hasClass('closed')) {
            $(this).removeClass('closed')
            $(this).siblings('.toc_container').slideDown()
          } else {
            $(this).addClass('closed')
            $(this).siblings('.toc_container').slideUp()
          }
        })
      let lastScrollTop = 0
      function findClosestH2() {
        var scrollTop = $(window).scrollTop()
        var h2Elements = $('.row_content_singleblog h2')
        var closestH2 = null
        var closestDistance = Infinity
        h2Elements.each(function () {
          var distance = Math.abs(scrollTop - $(this).offset().top)
          if (distance < closestDistance) {
            closestDistance = distance
            closestH2 = $(this).children('a').attr('id')
          }
        })
        return closestH2
      }
      $(window).on('scroll', function () {
        if (
          $('.fusion-tb-header').length > 0 &&
          $('.fusion-tb-header').hasClass('topSticky')
        ) {
          let headerHeight = $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).height()
          let firstOffset = $('.row_content_singleblog').offset().top
          let firstHeight = $('.row_content_singleblog').height()
          let firstBottom = firstOffset + firstHeight
          let firstTop = firstOffset - headerHeight
          let scrollPos = $(window).scrollTop() - 32
          let scrollBot = $(window).scrollTop() + $(window).height()
          let tableLeft =
            $('.row_content_singleblog').offset().left +
            $('.row_content_singleblog').width()
          let tableWidth = $('.blogpost-sidebar')
            .not('.mobile')
            .parent()
            .width()
          let tableHeight = $('.blogpost-sidebar').not('.mobile').height()
          let tableOffsetTop = $('.blogpost-sidebar').not('.mobile').offset()
            .top
          let tableOffsetBottom = tableHeight + tableOffsetTop
          let backScrollTopOffset = tableOffsetTop - headerHeight
          let st = $(this).scrollTop()
          if (st > lastScrollTop) {
            $('.row_content_singleblog h2').each(function () {
              if (
                $(this).offset().top - $(window).scrollTop() >= 0 &&
                $(this).offset().top - $(window).scrollTop() <= 200
              ) {
                let closestID = $(this).children('a').attr('id')
                $('.blog-toc-sidebar .quick_links .toc')
                  .find('li')
                  .removeClass('active')
                $('.blog-toc-sidebar .quick_links')
                  .find('a[href="#' + closestID + '"]')
                  .parent()
                  .addClass('active')
                return false
              }
            })
          } else {
            closestH2 = findClosestH2()
            $('.blog-toc-sidebar .quick_links .toc')
              .find('li')
              .removeClass('active')
            $('.blog-toc-sidebar .quick_links')
              .find('a[href="#' + closestH2 + '"]')
              .parent()
              .addClass('active')
          }
          lastScrollTop = st
          if (scrollPos < firstTop) {
            $('.blogpost-sidebar').not('.mobile').removeClass('fixed')
            $('.blogpost-sidebar').not('.mobile').addClass('sticky')
            $('.blogpost-sidebar')
              .not('.mobile')
              .css({ left: '0', top: '0', width: tableWidth + 'px' })
          } else if (scrollPos >= firstTop) {
            if ($('.blogpost-sidebar').not('.mobile').hasClass('fixed')) {
              if (tableOffsetBottom >= firstBottom) {
                $('.blogpost-sidebar').not('.mobile').removeClass('fixed')
                $('.blogpost-sidebar').not('.mobile').addClass('locked')
                $('.blogpost-sidebar')
                  .not('.mobile')
                  .css({ left: '0px', top: 'unset', width: tableWidth + 'px' })
              } else {
                $('.blogpost-sidebar').not('.mobile').removeClass('locked')
                $('.blogpost-sidebar').not('.mobile').addClass('fixed')
                $('.blogpost-sidebar')
                  .not('.mobile')
                  .css({
                    left: tableLeft,
                    top: 'auto',
                    width: tableWidth + 'px',
                  })
              }
            } else if (
              $('.blogpost-sidebar').not('.mobile').hasClass('locked')
            ) {
              if (scrollPos < backScrollTopOffset) {
                $('.blogpost-sidebar').not('.mobile').removeClass('locked')
                $('.blogpost-sidebar').not('.mobile').addClass('fixed')
                $('.blogpost-sidebar')
                  .not('.mobile')
                  .css({
                    left: tableLeft,
                    top: 'auto',
                    width: tableWidth + 'px',
                  })
              }
            } else {
              $('.blogpost-sidebar').not('.mobile').removeClass('sticky')
              $('.blogpost-sidebar').not('.mobile').addClass('fixed')
              $('.blogpost-sidebar')
                .not('.mobile')
                .css({ left: tableLeft, top: 'auto', width: tableWidth + 'px' })
            }
          }
        }
      })
      let headerHeight = $(
        '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
      ).height()
      let firstOffset = $('.row_content_singleblog').offset().top
      let firstHeight = $('.row_content_singleblog').height()
      let firstBottom = firstOffset + firstHeight
      let firstTop = firstOffset - headerHeight
      let scrollPos = $(window).scrollTop() - 32
      let scrollBot = $(window).scrollTop() + $(window).height()
      let tableLeft =
        $('.row_content_singleblog').offset().left +
        $('.row_content_singleblog').width()
      let tableWidth = $('.blogpost-sidebar').not('.mobile').parent().width()
      let tableHeight = $('.blogpost-sidebar').not('.mobile').height()
      let tableOffsetTop = $('.blogpost-sidebar').not('.mobile').offset().top
      let tableOffsetBottom = tableHeight + tableOffsetTop
      let backScrollTopOffset = tableOffsetTop - headerHeight
      if (scrollPos < firstTop) {
        $('.blogpost-sidebar').not('.mobile').removeClass('fixed')
        $('.blogpost-sidebar').not('.mobile').addClass('sticky')
        $('.blogpost-sidebar')
          .not('.mobile')
          .css({ left: '0', top: '0', width: tableWidth + 'px' })
      } else if (scrollPos >= firstTop) {
        let closestContent = $('.row_content_singleblog h2')
          .filter(function () {
            return $(this).offset().top - $(window).scrollTop() >= 0
          })
          .first()
        let closestID = closestContent.children('a').attr('id')
        $('.blog-toc-sidebar .quick_links .toc')
          .find('li')
          .removeClass('active')
        $('.blog-toc-sidebar .quick_links')
          .find('a[href="#' + closestID + '"]')
          .parent()
          .addClass('active')
        if ($('.blogpost-sidebar').not('.mobile').hasClass('fixed')) {
          if (tableOffsetBottom >= firstBottom) {
            $('.blogpost-sidebar').not('.mobile').removeClass('fixed')
            $('.blogpost-sidebar').not('.mobile').addClass('locked')
            $('.blogpost-sidebar')
              .not('.mobile')
              .css({ left: '0px', top: 'unset', width: tableWidth + 'px' })
          } else {
            $('.blogpost-sidebar').not('.mobile').removeClass('locked')
            $('.blogpost-sidebar').not('.mobile').addClass('fixed')
            $('.blogpost-sidebar')
              .not('.mobile')
              .css({ left: tableLeft, top: 'auto', width: tableWidth + 'px' })
          }
        } else if ($('.blogpost-sidebar').not('.mobile').hasClass('locked')) {
          if (scrollPos < backScrollTopOffset) {
            $('.blogpost-sidebar').not('.mobile').removeClass('locked')
            $('.blogpost-sidebar').not('.mobile').addClass('fixed')
            $('.blogpost-sidebar')
              .not('.mobile')
              .css({ left: tableLeft, top: 'auto', width: tableWidth + 'px' })
          }
        } else {
          $('.blogpost-sidebar').not('.mobile').removeClass('sticky')
          $('.blogpost-sidebar').not('.mobile').addClass('fixed')
          $('.blogpost-sidebar')
            .not('.mobile')
            .css({ left: tableLeft, top: 'auto', width: tableWidth + 'px' })
        }
      }
    }
    if ($('.progress-container .progress').length > 0) {
      let progressWidth = $('.progress-container').width()
      let windowHeight = $(window).height()
      $(window).on('scroll', function () {
        if ($('.fusion-tb-header').hasClass('topSticky')) {
          let bottomScroll = $(window).scrollTop()
          let lastItem = $('#author-widget').offset().top
          if (bottomScroll < lastItem) {
            let perWidth = (bottomScroll / lastItem) * 100
            $('.progress-container .progress').css({ width: perWidth + '%' })
          } else {
            $('.progress-container .progress').css({ width: '100%' })
          }
        } else {
          $('.progress-container .progress').css({ width: '0px' })
        }
      })
    }
    if ($('#logo-slideshow').length > 0) {
      let slideAmount =
        $('#logo-slideshow .slideshow-inner').find('.item').length - 1
      if ($('.influ-logo-carousel-section #logo-slideshow').length > 0) {
        $('#logo-slideshow .slideshow-inner').slick({
          speed: 2000,
          centerMode: true,
          centerPadding: '30px',
          autoplay: true,
          infinite: true,
          autoplaySpeed: 0,
          cssEase: 'linear',
          slidesToShow: slideAmount,
          arrows: false,
          responsive: [
            { breakpoint: 1000, settings: { slidesToShow: slideAmount } },
            { breakpoint: 749, settings: { slidesToShow: 2 } },
            { breakpoint: 576, settings: { slidesToShow: 1 } },
          ],
        })
      } else {
        $('#logo-slideshow .slideshow-inner').slick({
          speed: 2000,
          centerMode: true,
          centerPadding: '30px',
          autoplay: true,
          infinite: true,
          autoplaySpeed: 0,
          cssEase: 'linear',
          slidesToShow: slideAmount,
          arrows: false,
          responsive: [
            { breakpoint: 1000, settings: { slidesToShow: slideAmount } },
            { breakpoint: 600, settings: { slidesToShow: 3 } },
            { breakpoint: 480, settings: { slidesToShow: 3 } },
          ],
        })
      }
    }
    if ($('.credit-pack-faq').length > 0) {
      $('.faq-panel-wrapper .faq-panel-heading')
        .off('click')
        .on('click', function () {
          let target = $(this).data('call')
          $(
            '.faq-panel-wrapper .panel-content:not([data-expand="' +
              target +
              '"])',
          )
            .stop()
            .slideUp()
          $(
            '.faq-panel-wrapper .panel-content:not([data-expand="' +
              target +
              '"])',
          ).removeClass('expanded')
          if (
            $(
              '.faq-panel-wrapper .panel-content[data-expand="' + target + '"]',
            ).hasClass('expanded')
          ) {
            $(
              '.faq-panel-wrapper .panel-content[data-expand="' + target + '"]',
            ).removeClass('expanded')
            $(
              '.faq-panel-wrapper .panel-content[data-expand="' + target + '"]',
            ).slideUp()
          } else {
            $(
              '.faq-panel-wrapper .panel-content[data-expand="' + target + '"]',
            ).addClass('expanded')
            $(
              '.faq-panel-wrapper .panel-content[data-expand="' + target + '"]',
            ).slideDown()
          }
        })
    }
    if ($('.overflow-home.video-placeholder').length > 0) {
      $('.overflow-home.video-placeholder')
        .off('click')
        .on('click', function () {
          $(this).find('source').remove()
          $(this).hide()
          $(this).empty()
        })
    }
    if (
      $('.video-cu').length > 0 &&
      $('.overflow-home.video-placeholder').length > 0
    ) {
      $('.video-cu')
        .off('click')
        .on('click', function (e) {
          e.preventDefault()
          let videoUrl = $(this).find('video source').attr('src')
          $('.overflow-home.video-placeholder').append(
            $(
              '<video controls loop="true" autoplay="autoplay"><source src="' +
                videoUrl +
                '" type="video/mp4"></video>',
            ),
          )
          $('.overflow-home.video-placeholder video')[0].play()
          $('.overflow-home.video-placeholder').show()
        })
    }
    if (
      $('.videos-carousel').length > 0 &&
      $('.videos-carousel').children().length > 0
    ) {
      $('.videos-carousel')
        .not('.slick-initialized, .autoplay-on')
        .slick({
          slidesToShow: 4,
          slidesToScroll: 4,
          autoplay: false,
          variableWidth: true,
          prevArrow:
            '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
          nextArrow:
            '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
          dots: false,
          infinite: true,
          centerMode: false,
          swipeToSlide: false,
          responsive: [
            {
              breakpoint: 1000,
              settings: { slidesToShow: 3, slidesToScroll: 3, infinite: true },
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                swipeToSlide: true,
              },
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                swipeToSlide: true,
              },
            },
          ],
        })
      $('.videos-carousel.autoplay-on')
        .not('.slick-initialized')
        .slick({
          slidesToShow: 4,
          slidesToScroll: 4,
          autoplay: true,
          autoplaySpeed: 5000,
          variableWidth: true,
          prevArrow:
            '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
          nextArrow:
            '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
          dots: false,
          infinite: true,
          centerMode: false,
          swipeToSlide: false,
          responsive: [
            {
              breakpoint: 1000,
              settings: { slidesToShow: 3, slidesToScroll: 3, infinite: true },
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                swipeToSlide: true,
              },
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                swipeToSlide: true,
              },
            },
          ],
        })
      $('.videos-carousel').on('afterChange', function (
        event,
        slick,
        currentSlide,
      ) {
        onDemandVideos()
      })
      onDemandVideos()
      function onDemandVideos() {
        $('.videos-carousel .videos-carousel-inner.video-type').each(function (
          index,
        ) {
          if (
            $(this).offset().left > 0 &&
            $(this).offset().left < $(window).width()
          ) {
            if (!$(this).hasClass('loaded')) {
              $(this).addClass('loaded')
              let videoUrl = $(this).find('video').data('video-url')
              if ($(this).hasClass('small-on')) {
                videoUrl = $(this).find('video').data('video-small')
              }
              if (videoUrl.length > 0) {
                $(this)
                  .find('video')
                  .append($('<source src="' + videoUrl + '" type="video/mp4">'))
              }
            }
          }
        })
      }
      let sCoord = 0
      let eCoord = 0
      $(
        '.videos-carousel .videos-carousel-inner.video-type, .videos-carousel .videos-carousel-inner.image-type',
      ).on('mousedown', function (e) {
        sCoord = e.pageX
      })
      $(
        '.videos-carousel .videos-carousel-inner.video-type, .videos-carousel .videos-carousel-inner.image-type',
      ).on('mouseup', function (e) {
        eCoord = e.pageX
        $('.videos-carousel .videos-carousel-inner.video-type')
          .off('click')
          .on('click', function () {
            if (sCoord != eCoord) {
              return false
            } else {
              let videoUrl = $(this).find('video').data('video-url')
              $('.overflow-home.video-placeholder').append(
                $(
                  '<video controls loop="true"><source src="' +
                    videoUrl +
                    '" type="video/mp4"></video>',
                ),
              )
              $('.overflow-home.video-placeholder video')[0].play()
              $('.overflow-home.video-placeholder').show()
            }
          })
        $('.videos-carousel .videos-carousel-inner.image-type')
          .off('click')
          .on('click', function () {
            if (sCoord != eCoord) {
              return false
            } else {
              if (typeof $(this).data('url') !== 'undefined') {
                let targetUrl = $(this).data('url')
                window.open(targetUrl, '_blank')
              }
            }
          })
      })
      $(window).on('load', function () {
        $('.videos-carousel-inner.video-type video').each(function () {})
      })
    }
    if ($('#testimonials .testimonials-wrapper').length > 0) {
      $('#testimonials .testimonials-wrapper')
        .not('.slick-initialized')
        .slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          prevArrow:
            '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
          nextArrow:
            '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
          dots: false,
          infinite: true,
          centerMode: false,
          swipeToSlide: true,
          responsive: [
            {
              breakpoint: 1024,
              settings: { slidesToShow: 1, slidesToScroll: 1, infinite: true },
            },
            {
              breakpoint: 600,
              settings: { slidesToShow: 1, slidesToScroll: 1, infinite: true },
            },
            {
              breakpoint: 480,
              settings: { slidesToShow: 1, slidesToScroll: 1, infinite: true },
            },
          ],
        })
    }
    if (
      $('#improve-your-metrics .improve-your-metrics-accordion').length > 0 &&
      $('#improve-your-metrics .improve-your-metrics-accordion').children()
        .length > 0
    ) {
      let firstVideo = $(
        '#improve-your-metrics .improve-your-metrics-accordion',
      )
        .children('.active')
        .data('video-url')
      let firstImg = $('#improve-your-metrics .improve-your-metrics-accordion')
        .children('.active')
        .data('img-url')
      let firstTitle = $(
        '#improve-your-metrics .improve-your-metrics-accordion',
      )
        .children('.active')
        .data('graph-title')
      if ($(window).width() > 965) {
        $('.improve-your-metrics-video-wrapper.desktop .video-img').append(
          $('<span class="graph-title">' + firstTitle + '</span>'),
        )
        $('.improve-your-metrics-video-wrapper.desktop .video-img').append(
          $('<embed  src="' + firstImg + '"/>'),
        )
        $(
          '.improve-your-metrics-video-wrapper.desktop .right-video .video-input',
        ).append(
          $(
            '<video loop="true" autoplay="autoplay" playsinline muted><source src="' +
              firstVideo +
              '" type="video/mp4"></video>',
          ),
        )
      } else {
        $('.improve-your-metrics-video-wrapper.mobile-only .video-img').append(
          $('<span class="graph-title">' + firstTitle + '</span>'),
        )
        $('.improve-your-metrics-video-wrapper.mobile-only .video-img').append(
          $('<embed  src="' + firstImg + '"/>'),
        )
        $(
          '.improve-your-metrics-video-wrapper.mobile-only .right-video .video-input',
        ).append(
          $(
            '<video loop="true" autoplay="autoplay" playsinline muted><source src="' +
              firstVideo +
              '" playsinline type="video/mp4"></video>',
          ),
        )
      }
      $('.improve-your-metrics-accordion .single-tab .title')
        .off('click')
        .on('click', function () {
          let videoUrl = $(this).parent().data('video-url')
          let imgUrl = $(this).parent().data('img-url')
          let graphTitle = $(this).parent().data('graph-title')
          if (!$(this).parent().hasClass('active')) {
            $('.improve-your-metrics-accordion .single-tab').removeClass(
              'active',
            )
            $('.improve-your-metrics-accordion .single-tab .content-wrapper')
              .stop()
              .slideUp(0)
            $(this).siblings('.content-wrapper').show(0)
            $(this).parent().addClass('active')
            if ($(window).width() > 965) {
              $(
                '.improve-your-metrics-video-wrapper.desktop .video-img',
              ).empty()
              $(
                '.improve-your-metrics-video-wrapper.desktop .right-video .video-input',
              ).empty()
              $(
                '.improve-your-metrics-video-wrapper.desktop .video-img',
              ).append($('<span class="graph-title">' + graphTitle + '</span>'))
              $(
                '.improve-your-metrics-video-wrapper.desktop .video-img',
              ).append($('<embed style="display: none" src="' + imgUrl + '"/>'))
              $(
                '.improve-your-metrics-video-wrapper.desktop .right-video .video-input',
              ).append(
                $(
                  '<video style="display: none" loop="true" autoplay="autoplay" playsinline muted><source src="' +
                    videoUrl +
                    '" type="video/mp4"></video>',
                ),
              )
              $(
                '.improve-your-metrics-video-wrapper.desktop .video-img embed',
              ).show(0)
              $(
                '.improve-your-metrics-video-wrapper.desktop .right-video .video-input video',
              ).show(0)
            } else {
              $('.improve-your-metrics-video-wrapper .video-img').empty()
              $(
                '.improve-your-metrics-video-wrapper .right-video .video-input',
              ).empty()
              $(this)
                .parent()
                .find(
                  '.improve-your-metrics-video-wrapper.mobile-only .video-img',
                )
                .append(
                  $('<span class="graph-title">' + graphTitle + '</span>'),
                )
              $(this)
                .parent()
                .find(
                  '.improve-your-metrics-video-wrapper.mobile-only .video-img',
                )
                .append(
                  $('<embed  style="display: none" src="' + imgUrl + '"/>'),
                )
              $(this)
                .parent()
                .find(
                  '.improve-your-metrics-video-wrapper.mobile-only .right-video .video-input',
                )
                .append(
                  $(
                    '<video style="display: none" loop="true" playsinline autoplay="autoplay" muted><source src="' +
                      videoUrl +
                      '" type="video/mp4"></video>',
                  ),
                )
              $(this)
                .parent()
                .find(
                  '.improve-your-metrics-video-wrapper.mobile-only .video-img embed',
                )
                .show(0)
              $(this)
                .parent()
                .find(
                  '.improve-your-metrics-video-wrapper.mobile-only .right-video .video-input video',
                )
                .show(0)
            }
          }
        })
    }
    if ($('.packs-slider.hybrid').length > 0) {
      if ($('.view-single-pack-details').length > 0) {
        $('.view-single-pack-details')
          .off('click')
          .on('click', function () {
            if ($(this).siblings('.single-pack-popup-wrapper').length > 0) {
              $(this).siblings('.single-pack-popup-wrapper').show()
            }
          })
      }
      if ($('.single-pack-popup-wrapper').length > 0) {
        $('.single-pack-popup-wrapper')
          .off('click')
          .on('click', function () {
            $(this).hide()
          })
      }
      if ($('.single-pack-popup-wrapper .close-popup').length > 0) {
        $('.single-pack-popup-wrapper .close-popup')
          .off('click')
          .on('click', function () {
            $(this).closest('.single-pack-popup-wrapper').hide()
          })
      }
    }
    if ($('.scroll-contents').length > 0) {
      $(window).on('scroll', function () {
        if (
          $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).length > 0 &&
          $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).hasClass('sticky')
        ) {
          let headerHeight = $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).height()
          let firstOffset = $('.scroll-container').offset().top
          let firstTop = firstOffset - headerHeight
          let scrollPos = $(window).scrollTop()
          let scrollBot = $(window).scrollTop() + $(window).height()
          let tableLeft = $('.scroll-contents').offset().left
          let tableWidth = $('.scroll-contents').width()
          let tableHeight = $('.scroll-contents').height()
          let tableOffsetTop = $('.scroll-contents').offset().top
          let tableBot = tableOffsetTop + tableHeight
          if (scrollPos >= firstTop) {
            let closestContent = $('.structure-custom')
              .filter(function () {
                return $(this).offset().top - $(window).scrollTop() >= 0
              })
              .first()
            let closestID = closestContent.attr('id')
            $('.scroll-contents').find('a').removeClass('active')
            $('.scroll-contents')
              .find('a[href="#' + closestID + '"]')
              .addClass('active')
            if (scrollBot >= tableBot) {
              $('.scroll-contents')
                .children('.fusion-column-wrapper')
                .removeClass('fixed')
              $('.scroll-contents')
                .children('.fusion-column-wrapper')
                .removeClass('sticky')
              $('.scroll-contents')
                .children('.fusion-column-wrapper')
                .addClass('locked')
              $('.scroll-contents')
                .children('.fusion-column-wrapper')
                .css({
                  position: 'absolute',
                  left: '0px',
                  bottom: '0',
                  top: 'unset',
                  width: '100%',
                  margin: '0',
                  'padding-inline': '25px',
                })
            } else {
              $('.scroll-contents')
                .children('.fusion-column-wrapper')
                .removeClass('sticky')
              $('.scroll-contents')
                .children('.fusion-column-wrapper')
                .removeClass('locked')
              $('.scroll-contents')
                .children('.fusion-column-wrapper')
                .addClass('fixed')
              $('.scroll-contents')
                .children('.fusion-column-wrapper')
                .css({
                  position: 'fixed',
                  bottom: 'unset',
                  left: tableLeft + 'px',
                  top: headerHeight + 'px',
                  width: tableWidth + 'px',
                  margin: '0',
                  'padding-inline': '25px',
                })
            }
          } else {
            $('.scroll-contents').find('a').removeClass('active')
            $('.scroll-contents')
              .children('.fusion-column-wrapper')
              .removeClass('fixed')
            $('.scroll-contents')
              .children('.fusion-column-wrapper')
              .removeClass('locked')
            $('.scroll-contents')
              .children('.fusion-column-wrapper')
              .addClass('sticky')
            $('.scroll-contents')
              .children('.fusion-column-wrapper')
              .css({
                position: 'absolute',
                left: '0px',
                top: '0',
                bottom: 'unset',
                width: '100%',
                margin: '0',
                'padding-inline': '25px',
              })
          }
        }
      })
    }
    if ($('.scroll-container .content-wrapper').length > 0) {
      if ($('.bfa-track').length > 0) {
        $('.bfa-track, .bfa-track .video-wrapper video')
          .off('click')
          .on('click', function () {
            let mainVideoEl = $('.bfa-track .video-wrapper video')[0]
            let mainVideoUrl = $('.bfa-track .video-wrapper video')
              .find('source')
              .attr('src')
              .split('/')
            let mainVideoTitle = mainVideoUrl[mainVideoUrl.length - 1]
            let mainTrigger1 = ''
            let mainTrigger2 = ''
            let mainTrigger3 = ''
            let mainTrigger4 = ''
            window.dataLayer = window.dataLayer || []
            dataLayer.push({ event: 'video_start', videoTitle: mainVideoTitle })
            $(mainVideoEl)
              .off('timeupdate')
              .on('timeupdate', function () {
                const duration = mainVideoEl.duration
                const quarterDuration = duration / 4
                let currentTime = mainVideoEl.currentTime
                if (mainTrigger1 == '' && currentTime >= quarterDuration) {
                  window.dataLayer = window.dataLayer || []
                  dataLayer.push({
                    event: 'video_progress',
                    videoTitle: mainVideoTitle,
                    percentageWatched: 25,
                  })
                  mainTrigger1 = 'done'
                } else if (
                  mainTrigger2 == '' &&
                  currentTime >= 2 * quarterDuration
                ) {
                  window.dataLayer = window.dataLayer || []
                  dataLayer.push({
                    event: 'video_progress',
                    videoTitle: mainVideoTitle,
                    percentageWatched: 50,
                  })
                  mainTrigger2 = 'done'
                } else if (
                  mainTrigger3 == '' &&
                  currentTime >= 3 * quarterDuration
                ) {
                  window.dataLayer = window.dataLayer || []
                  dataLayer.push({
                    event: 'video_progress',
                    videoTitle: mainVideoTitle,
                    percentageWatched: 75,
                  })
                  mainTrigger3 = 'done'
                } else if (mainTrigger4 == '' && currentTime >= duration - 5) {
                  window.dataLayer = window.dataLayer || []
                  dataLayer.push({
                    event: 'video_complete',
                    videoTitle: mainVideoTitle,
                  })
                  mainTrigger4 = 'done'
                }
              })
          })
      }
      if ($('.scroll-contents').length > 0) {
        $(
          '.scroll-contents .bg2 a, .fusion-text.fusion-text-2.bg1 a, .bg2_m.mob-b a',
        )
          .off('click')
          .on('click', function (e) {
            e.preventDefault()
            let target = $(this).attr('href')
            if (target !== '') {
              $('html, body')
                .stop()
                .animate({ scrollTop: $(target).offset().top - 100 }, 1000)
            }
          })
      }
      $('.content-wrapper .single-type-wrapper .type-image')
        .off('click')
        .on('click', function () {
          let video = $(this).data('video')
          if (video.length > 0) {
            $('body').addClass('no-scroll')
            $('.modal-quiz-video-overlay .modal-quiz-video').html(
              '<video controls><source src="' +
                video +
                '" type="video/mp4"></video>',
            )
            $('.modal-quiz-video-overlay .modal-quiz-video video')[0].play()
            $('.modal-quiz-video-overlay').show()
            if (window.location.href.indexOf('black-friday-ads') > -1) {
              let videoEl = $(
                '.modal-quiz-video-overlay .modal-quiz-video video',
              )[0]
              let videoUrl = $(
                '.modal-quiz-video-overlay .modal-quiz-video video',
              )
                .find('source')
                .attr('src')
                .split('/')
              let videoTitle = videoUrl[videoUrl.length - 1]
              window.dataLayer = window.dataLayer || []
              dataLayer.push({ event: 'video_start', videoTitle: videoTitle })
              let trigger1 = ''
              let trigger2 = ''
              let trigger3 = ''
              let trigger4 = ''
              $(videoEl)
                .off('timeupdate')
                .on('timeupdate', function () {
                  const duration = videoEl.duration
                  const quarterDuration = duration / 4
                  let currentTime = videoEl.currentTime
                  if (trigger1 == '' && currentTime >= quarterDuration) {
                    window.dataLayer = window.dataLayer || []
                    dataLayer.push({
                      event: 'video_progress',
                      videoTitle: videoTitle,
                      percentageWatched: 25,
                    })
                    trigger1 = 'done'
                  } else if (
                    trigger2 == '' &&
                    currentTime >= 2 * quarterDuration
                  ) {
                    window.dataLayer = window.dataLayer || []
                    dataLayer.push({
                      event: 'video_progress',
                      videoTitle: videoTitle,
                      percentageWatched: 50,
                    })
                    trigger2 = 'done'
                  } else if (
                    trigger3 == '' &&
                    currentTime >= 3 * quarterDuration
                  ) {
                    window.dataLayer = window.dataLayer || []
                    dataLayer.push({
                      event: 'video_progress',
                      videoTitle: videoTitle,
                      percentageWatched: 75,
                    })
                    trigger3 = 'done'
                  } else if (trigger4 == '' && currentTime == duration) {
                    window.dataLayer = window.dataLayer || []
                    dataLayer.push({
                      event: 'video_complete',
                      videoTitle: videoTitle,
                    })
                    trigger4 = 'done'
                  }
                })
            }
          }
        })
      $(
        '.modal-quiz-video-overlay, .modal-quiz-video-overlay .modal-quiz-video-close',
      )
        .off('click')
        .on('click', function (e) {
          e.preventDefault()
          if (e.target !== e.currentTarget) return
          $('.modal-quiz-video-overlay').hide()
          $('.modal-quiz-video-overlay .modal-quiz-video video')[0].pause()
          $(
            '.modal-quiz-video-overlay .modal-quiz-video video',
          )[0].currentTime = 0
          $('.modal-quiz-video-overlay .modal-quiz-video video')
            .find('source')
            .remove()
          $('.modal-quiz-video-overlay .modal-quiz-video video').remove()
        })
      $('.modal-quiz-video')
        .off('click')
        .on('click', function (e) {
          $('.modal-quiz-video-overlay').hide()
          $('.modal-quiz-video video')[0].pause()
          $('.modal-quiz-video video')[0].currentTime = 0
          $('.modal-quiz-video video').find('source').remove()
          $('.modal-quiz-video video').remove()
        })
      $('.content-wrapper').each(function () {
        $(this)
          .not('.slick-initialized')
          .slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay: false,
            prevArrow:
              '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left"></i></button>',
            nextArrow:
              '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right"></i></button>',
            dots: false,
            infinite: false,
            centerMode: false,
            swipeToSlide: true,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  infinite: true,
                },
              },
              {
                breakpoint: 800,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  infinite: true,
                },
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                },
              },
            ],
          })
      })
    }
    if ($('#hero .video-slider-wrapper').length > 0) {
      $('#hero .video-slider-wrapper')
        .not('.slick-initialized')
        .slick({
          slidesToShow: 5,
          slidesToScroll: 5,
          autoplay: false,
          variableWidth: false,
          prevArrow:
            '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
          nextArrow:
            '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
          dots: false,
          infinite: false,
          centerMode: false,
          swipeToSlide: false,
          responsive: [
            {
              breakpoint: 1000,
              settings: { slidesToShow: 3, slidesToScroll: 3, infinite: true },
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                swipeToSlide: true,
              },
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                swipeToSlide: true,
              },
            },
          ],
        })
    }
    if ($('.section_creator.seo-landing').length > 0) {
      $('.section_creator.seo-landing .wrap_creator .creator_post')
        .not('.slick-initialized')
        .slick({
          slidesToShow: 4,
          slidesToScroll: 4,
          autoplay: false,
          variableWidth: false,
          prevArrow:
            '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
          nextArrow:
            '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
          dots: false,
          infinite: false,
          centerMode: false,
          swipeToSlide: false,
          responsive: [
            {
              breakpoint: 1000,
              settings: { slidesToShow: 3, slidesToScroll: 3, infinite: true },
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                swipeToSlide: true,
              },
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                swipeToSlide: true,
              },
            },
          ],
        })
      if ($('.open-popup').length > 0 && $('.overflow-seo').length > 0) {
        $('.open-popup')
          .off('click')
          .on('click', function () {
            let url = $(this).data('video')
            $('.overflow-seo.video-placeholder ').append()
          })
      }
    }
    if ($('.seo-video-carousel-wrapper .video-carousel').length > 0) {
      $(window).on('resize', function () {
        if ($(window).width() < 1000) {
          $('.seo-video-carousel-wrapper .video-carousel')
            .not('.slick-initialized')
            .slick({
              slidesToShow: 3,
              slidesToScroll: 3,
              autoplay: false,
              variableWidth: false,
              prevArrow:
                '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
              nextArrow:
                '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
              dots: false,
              infinite: true,
              centerMode: false,
              swipeToSlide: false,
              responsive: [
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    swipeToSlide: true,
                  },
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    swipeToSlide: true,
                  },
                },
              ],
            })
        } else {
          if ($('.video-carousel.slick-slider').length > 0) {
            $('.seo-video-carousel-wrapper .video-carousel').slick('unslick')
          }
        }
      })
      if ($(window).width() < 1000) {
        $('.seo-video-carousel-wrapper .video-carousel')
          .not('.slick-initialized')
          .slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay: false,
            variableWidth: false,
            prevArrow:
              '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
            nextArrow:
              '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
            dots: false,
            infinite: true,
            centerMode: false,
            swipeToSlide: false,
            responsive: [
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  infinite: true,
                  swipeToSlide: true,
                },
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  infinite: true,
                  variableWidth: true,
                  swipeToSlide: true,
                },
              },
            ],
          })
      }
    }
    if ($('.open-popup').length > 0 && $('.overflow-seo').length > 0) {
      $('.video-content .video-thumbnail')
        .off('click')
        .on('click', function () {
          let videoUrl = $(this).parent().data('video')
          $('.overflow-seo.video-placeholder .modal-seo-video').append(
            $(
              '<video playsinline controls><source src="' +
                videoUrl +
                '"></video>',
            ),
          )
          $('.overflow-seo.video-placeholder').show()
          $('.overflow-seo.video-placeholder .modal-seo-video video')[0].play()
        })
      $('.video-content.open-popup')
        .off('click')
        .on('click', function (e) {
          if (e.target !== e.currentTarget) return
          let videoUrl = $(this).data('video')
          $('.overflow-seo.video-placeholder .modal-seo-video').append(
            $(
              '<video playsinline controls><source src="' +
                videoUrl +
                '"></video>',
            ),
          )
          $('.overflow-seo.video-placeholder').show()
          $('.overflow-seo.video-placeholder .modal-seo-video video')[0].play()
        })
      $('.video-content .video-tags')
        .off('click')
        .on('click', function (e) {
          let videoUrl = $(this).parent().data('video')
          $('.overflow-seo.video-placeholder .modal-seo-video').append(
            $(
              '<video playsinline controls><source src="' +
                videoUrl +
                '"></video>',
            ),
          )
          $('.overflow-seo.video-placeholder').show()
          $('.overflow-seo.video-placeholder .modal-seo-video video')[0].play()
        })
      $('.overflow-seo.video-placeholder')
        .off('click')
        .on('click', function () {
          $(this).hide()
          $(this).find('source').remove()
          $('.overflow-seo.video-placeholder .modal-seo-video').empty()
        })
      $('.overflow-seo .modal-seo-video-close')
        .off('click')
        .on('click', function () {
          $('.overflow-seo.video-placeholder').hide()
          $('.overflow-seo.video-placeholder').find('source').remove()
          $('.overflow-seo.video-placeholder .modal-seo-video').empty()
        })
    }
    if ($('.random-video-slider-wrapper').length > 0) {
      $('.video-content .video-thumbnail')
        .off('click')
        .on('click', function () {
          let videoUrl = $(this).parent().data('video')
          $('.overflow-seo.video-placeholder .modal-seo-video').append(
            $(
              '<video playsinline controls><source src="' +
                videoUrl +
                '"></video>',
            ),
          )
          $('.overflow-seo.video-placeholder').show()
          $('.overflow-seo.video-placeholder .modal-seo-video video')[0].play()
        })
      $('.overflow-seo.video-placeholder')
        .off('click')
        .on('click', function () {
          $(this).hide()
          $(this).find('source').remove()
          $('.overflow-seo.video-placeholder .modal-seo-video').empty()
        })
      $('.video-content.open-popup')
        .off('click')
        .on('click', function (e) {
          if (e.target !== e.currentTarget) return
          let videoUrl = $(this).data('video')
          $('.overflow-seo.video-placeholder .modal-seo-video').append(
            $(
              '<video playsinline controls><source src="' +
                videoUrl +
                '"></video>',
            ),
          )
          $('.overflow-seo.video-placeholder').show()
          $('.overflow-seo.video-placeholder .modal-seo-video video')[0].play()
        })
      $('.overflow-seo .modal-seo-video-close')
        .off('click')
        .on('click', function () {
          $('.overflow-seo.video-placeholder').hide()
          $('.overflow-seo.video-placeholder').find('source').remove()
          $('.overflow-seo.video-placeholder .modal-seo-video').empty()
        })
    }
    if ($('.custom-seo-link-list-container').length > 0) {
      if ($(window).width() < 800) {
        if ($('.seo-link-list').length > 0) {
          $('.custom-seo-link-list-container .seo-link-list')
            .not('.slick-initialized')
            .slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              autoplay: false,
              variableWidth: false,
              prevArrow:
                '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
              nextArrow:
                '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
              dots: false,
              infinite: true,
              centerMode: false,
              swipeToSlide: false,
            })
        }
      }
      $(window)
        .off('resize')
        .on('resize', function () {
          if ($(window).width() < 800) {
            if ($('.seo-link-list').length > 0) {
              $('.custom-seo-link-list-container .seo-link-list')
                .not('.slick-initialized')
                .slick({
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  autoplay: false,
                  variableWidth: false,
                  prevArrow:
                    '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
                  nextArrow:
                    '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
                  dots: false,
                  infinite: true,
                  centerMode: false,
                  swipeToSlide: false,
                })
            }
          } else {
            if (
              $(
                '.custom-seo-link-list-container .seo-link-list.slick-initialized',
              ).length > 0
            ) {
              $('.custom-seo-link-list-container .seo-link-list').slick(
                'unslick',
              )
            }
          }
        })
    }
    if ($('.ugc-table').length > 0 && $('.ugc-table .mobile-hide').length > 0) {
      $('.ugc-table .btn-ugc-custom-table')
        .off('click')
        .on('click', function () {
          $(this).empty()
          if ($(this).hasClass('open')) {
            $(this).append(
              'Show more <img class=" lazyloaded" decoding="async" src="https://billo.app/wp-content/uploads/2024/02/Add-25.svg" data-orig-src="https://billo.app/wp-content/uploads/2024/02/Add-25.svg" alt="3 Winning UGC Video Ad Templates">',
            )
          } else {
            $(this).append(
              'Show less <img class=" lazyloaded" decoding="async" src="https://billo.app/wp-content/uploads/2024/02/Add-25-1.svg" data-orig-src="https://billo.app/wp-content/uploads/2024/02/Add-25-1.svg" alt="3 Winning UGC Video Ad Templates">',
            )
          }
          $(this).toggleClass('open')
          $(this).siblings('.mobile-hide').slideToggle()
        })
    }
    if (
      $('.fusion-flex-container.mobile-hide-section').length > 0 &&
      $('.btn-benefits-custom-mobile').length > 0
    ) {
      $('.btn-benefits-custom-mobile')
        .off('click')
        .on('click', function () {
          if ($(this).hasClass('open')) {
            $(this).text('Show more')
          } else {
            $(this).text('Show less')
          }
          $(this).toggleClass('open')
          $('.fusion-flex-container.mobile-hide-section').slideToggle()
        })
    }
    if ($('.rework-blog-categories').length > 0) {
      if ($(window).width() < 800) {
        $('.rework-blog-categories')
          .not('.slick-initialized')
          .slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            variableWidth: true,
            arrows: false,
            dots: false,
            infinite: false,
            centerMode: false,
            swipeToSlide: true,
          })
      } else {
        if ($('.rework-blog-categories.slick-initialized').length > 0) {
          $('.rework-blog-categories').slick('unslick')
        }
      }
      $(window).on('resize', function () {
        if ($(window).width() < 800) {
          $('.rework-blog-categories')
            .not('.slick-initialized')
            .slick({
              slidesToShow: 3,
              slidesToScroll: 1,
              autoplay: false,
              variableWidth: true,
              arrows: false,
              dots: false,
              infinite: false,
              centerMode: false,
              swipeToSlide: true,
            })
        } else {
          if ($('.rework-blog-categories.slick-initialized').length > 0) {
            $('.rework-blog-categories').slick('unslick')
          }
        }
      })
    }
    if ($('.init-random-video-slick').length > 0) {
      $('.random-video-slider-wrapper')
        .not('.slick-initialized')
        .slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: false,
          variableWidth: false,
          prevArrow:
            '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
          nextArrow:
            '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
          dots: false,
          infinite: true,
          centerMode: false,
          swipeToSlide: true,
          responsive: [
            { breakpoint: 1000, settings: { slidesToShow: 3 } },
            { breakpoint: 800, settings: { slidesToShow: 2 } },
            { breakpoint: 480, settings: { slidesToShow: 1 } },
          ],
        })
    }
    if (
      $('.open-popup').length > 0 &&
      $('.overflow-seo').length > 0 &&
      $('.testimonials-section .testimonials-wrapper').length > 0
    ) {
      $('.testimonial .thumb-image.open-popup')
        .off('click')
        .on('click', function () {
          let videoUrl = $(this).data('video')
          $('.overflow-seo.video-placeholder .modal-seo-video').prepend(
            $(
              '<video playsinline controls><source src="' +
                videoUrl +
                '"></video>',
            ),
          )
          $('.overflow-seo.video-placeholder').show()
          $('.overflow-seo.video-placeholder .modal-seo-video video')[0].play()
        })
      $('.overflow-seo.video-placeholder')
        .off('click')
        .on('click', function () {
          $(this).hide()
          $(this).find('source').remove()
          $('.overflow-seo.video-placeholder .modal-seo-video video').remove()
        })
      $('.overflow-seo .modal-seo-video-close')
        .off('click')
        .on('click', function () {
          $('.overflow-seo.video-placeholder').hide()
          $('.overflow-seo.video-placeholder').find('source').remove()
          $('.overflow-seo.video-placeholder .modal-seo-video video').remove()
        })
    }
    if (
      $('.open-popup').length > 0 &&
      $('.overflow-seo').length > 0 &&
      $('.testimonials-section-rework .testimonials-wrapper').length > 0
    ) {
      $('.testimonials-section-rework .testimonials-wrapper')
        .not('.slick-initialized')
        .slick({
          slidesToShow: 3,
          infinite: true,
          slidesToScroll: 1,
          autoplay: false,
          arrows: true,
          dots: true,
          appendDots: $('.testimonial-rework-navigation .dots'),
          prevArrow: $('.testimonial-rework-navigation .slick-left'),
          nextArrow: $('.testimonial-rework-navigation .slick-right'),
          centerMode: true,
          centerPadding: '0px',
          variableWidth: true,
          useCSS: false,
          responsive: [
            { breakpoint: 1000, settings: { slidesToShow: 3 } },
            { breakpoint: 801, settings: { slidesToShow: 1 } },
          ],
        })
      $('.testimonial .thumb-image.open-popup')
        .off('click')
        .on('click', function () {
          let videoUrl = $(this).data('video')
          $('.overflow-seo.video-placeholder .modal-seo-video').prepend(
            $(
              '<video playsinline controls><source src="' +
                videoUrl +
                '"></video>',
            ),
          )
          $('.overflow-seo.video-placeholder').show()
          $('.overflow-seo.video-placeholder .modal-seo-video video')[0].play()
        })
      $('.overflow-seo.video-placeholder')
        .off('click')
        .on('click', function () {
          $(this).hide()
          $(this).find('source').remove()
          $('.overflow-seo.video-placeholder .modal-seo-video video').remove()
        })
      $('.overflow-seo .modal-seo-video-close')
        .off('click')
        .on('click', function () {
          $('.overflow-seo.video-placeholder').hide()
          $('.overflow-seo.video-placeholder').find('source').remove()
          $('.overflow-seo.video-placeholder .modal-seo-video video').remove()
        })
    }
    if ($('.case-study-hero-section .image-video-wrapper video').length > 0) {
      $('.case-study-hero-section .image-video-wrapper video')
        .off('click')
        .on('click', function () {
          if ($(this).prop('muted')) {
            $(this).addClass('with-sound')
            $(this).prop('muted', false)
          } else {
            $(this).removeClass('with-sound')
            $(this).prop('muted', true)
          }
        })
    }
    function sidebarLock(
      wrapper,
      childClass,
      className,
      headerHeight,
      tableLeft,
      tableWidth,
      padding,
    ) {
      if (className == 'locked') {
        wrapper.children(childClass).removeClass('fixed')
        wrapper.children(childClass).removeClass('sticky')
        wrapper.children(childClass).addClass('locked')
        wrapper
          .children(childClass)
          .css({
            position: 'absolute',
            left: '0px',
            bottom: '0',
            top: 'unset',
            width: '100%',
            margin: '0',
            padding: padding,
          })
      }
      if (className == 'fixed') {
        wrapper.children(childClass).removeClass('sticky')
        wrapper.children(childClass).removeClass('locked')
        wrapper.children(childClass).addClass('fixed')
        wrapper
          .children(childClass)
          .css({
            position: 'fixed',
            bottom: 'unset',
            left: tableLeft + 'px',
            top: headerHeight + 30 + 'px',
            width: tableWidth + 'px',
            margin: '0',
            padding: padding,
          })
      }
      if (className == 'sticky') {
        wrapper.children(childClass).removeClass('fixed')
        wrapper.children(childClass).removeClass('locked')
        wrapper.children(childClass).addClass('sticky')
        wrapper
          .children(childClass)
          .css({
            position: 'absolute',
            left: '0px',
            top: '0',
            bottom: 'unset',
            width: '100%',
            margin: '0',
            padding: padding,
          })
      }
      return
    }
    if ($('.quote-block .case-study-quote-wrapper .study-quote').length > 0) {
      if ($(window).width() > 801) {
        if (
          $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).length > 0 &&
          $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).hasClass('sticky')
        ) {
          let st = $(this).scrollTop()
          let headerHeight = $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).height()
          let firstOffset = $('.quote-block .case-study-quote-wrapper').offset()
            .top
          let firstTop = firstOffset - headerHeight
          let scrollPos = $(window).scrollTop()
          let scrollBot = $(window).scrollTop() + headerHeight + 30
          let tableLeft =
            $('.quote-block .case-study-quote-wrapper').offset().left - 24.5
          let tableWidth =
            $('.quote-block .case-study-quote-wrapper').width() + 24.5
          let tableHeight = $('.quote-block .case-study-quote-wrapper').height()
          let tableOffsetTop = $(
            '.quote-block .case-study-quote-wrapper',
          ).offset().top
          let tableBot = tableOffsetTop + tableHeight
          let contReadHeight =
            $('.case-study-content').height() +
            $('.case-study-content').offset().top
          let sideBarScroll =
            $('.study-quote').offset().top + $('.study-quote').height()
          if (scrollPos >= firstTop) {
            if (sideBarScroll >= contReadHeight) {
              sidebarLock(
                $('.quote-block .case-study-quote-wrapper'),
                '.study-quote',
                'locked',
                headerHeight,
                tableLeft,
                tableWidth,
                '0px 28px',
              )
            } else {
              sidebarLock(
                $('.quote-block .case-study-quote-wrapper'),
                '.study-quote',
                'fixed',
                headerHeight,
                tableLeft,
                tableWidth,
                '0px 28px',
              )
            }
          } else {
            sidebarLock(
              $('.quote-block .case-study-quote-wrapper'),
              '.study-quote',
              'sticky',
              headerHeight,
              tableLeft,
              tableWidth,
              '0px 28px',
            )
          }
        }
      }
      let lastScrollTop = 0
      $(window).on('scroll', function () {
        if ($(window).width() > 801) {
          if (
            $(
              '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
            ).length > 0 &&
            $(
              '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
            ).hasClass('sticky')
          ) {
            let st = $(this).scrollTop()
            let headerHeight = $(
              '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
            ).height()
            let firstOffset = $(
              '.quote-block .case-study-quote-wrapper',
            ).offset().top
            let firstTop = firstOffset - headerHeight
            let scrollPos = $(window).scrollTop()
            let scrollBot = $(window).scrollTop() + headerHeight + 30
            let tableLeft =
              $('.quote-block .case-study-quote-wrapper').offset().left - 24.5
            let tableWidth =
              $('.quote-block .case-study-quote-wrapper').width() + 24.5
            let tableHeight = $(
              '.quote-block .case-study-quote-wrapper',
            ).height()
            let tableOffsetTop = $(
              '.quote-block .case-study-quote-wrapper',
            ).offset().top
            let tableBot = tableOffsetTop + tableHeight
            let contReadHeight =
              $('.case-study-content').height() +
              $('.case-study-content').offset().top
            let sideBarScroll =
              $('.study-quote').offset().top + $('.study-quote').height()
            if (scrollPos >= firstTop) {
              if (st > lastScrollTop) {
                if (sideBarScroll >= contReadHeight) {
                  sidebarLock(
                    $('.quote-block .case-study-quote-wrapper'),
                    '.study-quote',
                    'locked',
                    headerHeight,
                    tableLeft,
                    tableWidth,
                    '0px 28px',
                  )
                } else {
                  sidebarLock(
                    $('.quote-block .case-study-quote-wrapper'),
                    '.study-quote',
                    'fixed',
                    headerHeight,
                    tableLeft,
                    tableWidth,
                    '0px 28px',
                  )
                }
              } else {
                let sidebarHeight = $(
                  '.quote-block .case-study-quote-wrapper .study-quote',
                ).height()
                let contBotCutoff = contReadHeight - sidebarHeight
                if (scrollBot <= contBotCutoff) {
                  sidebarLock(
                    $('.quote-block .case-study-quote-wrapper'),
                    '.study-quote',
                    'fixed',
                    headerHeight,
                    tableLeft,
                    tableWidth,
                    '0px 28px',
                  )
                }
              }
              lastScrollTop = st
            } else {
              sidebarLock(
                $('.quote-block .case-study-quote-wrapper'),
                '.study-quote',
                'sticky',
                headerHeight,
                tableLeft,
                tableWidth,
                '0px 28px',
              )
            }
          }
        }
      })
    }
    if ($('.case-studies-wrapper .case-studies-filter').length > 0) {
      if ($(window).width() > 801) {
        if (
          $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).length > 0 &&
          $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).hasClass('sticky')
        ) {
          let st = $(this).scrollTop()
          let headerHeight = $(
            '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
          ).height()
          let firstOffset = $(
            '.case-studies-wrapper .case-studies-filter-wrapper',
          ).offset().top
          let firstTop = firstOffset - headerHeight
          let scrollPos = $(window).scrollTop()
          let scrollBot = $(window).scrollTop() + headerHeight + 30
          let tableLeft = $(
            '.case-studies-wrapper .case-studies-filter-wrapper',
          ).offset().left
          let tableWidth = $(
            '.case-studies-wrapper .case-studies-filter-wrapper',
          ).width()
          let tableHeight = $(
            '.case-studies-wrapper .case-studies-filter-wrapper',
          ).height()
          let tableOffsetTop = $(
            '.case-studies-wrapper .case-studies-filter-wrapper',
          ).offset().top
          let tableBot = tableOffsetTop + tableHeight
          let contReadHeight =
            $('.case-studies-posts-wrapper').height() +
            $('.case-studies-posts-wrapper').offset().top
          let sideBarScroll =
            $('.case-studies-filter').offset().top +
            $('.case-studies-filter').height()
          if (scrollPos >= firstTop) {
            if (sideBarScroll >= contReadHeight - 10) {
              sidebarLock(
                $('.case-studies-wrapper .case-studies-filter-wrapper'),
                '.case-studies-filter',
                'locked',
                headerHeight,
                tableLeft,
                tableWidth,
                '',
              )
            } else {
              sidebarLock(
                $('.case-studies-wrapper .case-studies-filter-wrapper'),
                '.case-studies-filter',
                'fixed',
                headerHeight,
                tableLeft,
                tableWidth,
                '',
              )
            }
          } else {
            sidebarLock(
              $('.case-studies-wrapper .case-studies-filter-wrapper'),
              '.case-studies-filter',
              'sticky',
              headerHeight,
              tableLeft,
              tableWidth,
              '',
            )
          }
        }
      }
      let lastScrollTop = 0
      $(window).on('scroll', function () {
        if ($(window).width() > 801) {
          if (
            $(
              '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
            ).length > 0 &&
            $(
              '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
            ).hasClass('sticky')
          ) {
            let st = $(this).scrollTop()
            let headerHeight = $(
              '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
            ).height()
            let firstOffset = $(
              '.case-studies-wrapper .case-studies-filter-wrapper',
            ).offset().top
            let firstTop = firstOffset - headerHeight
            let scrollPos = $(window).scrollTop()
            let scrollBot = $(window).scrollTop() + headerHeight + 30
            let tableLeft = $(
              '.case-studies-wrapper .case-studies-filter-wrapper',
            ).offset().left
            let tableWidth = $(
              '.case-studies-wrapper .case-studies-filter-wrapper',
            ).width()
            let tableHeight = $(
              '.case-studies-wrapper .case-studies-filter-wrapper',
            ).height()
            let tableOffsetTop = $(
              '.case-studies-wrapper .case-studies-filter-wrapper',
            ).offset().top
            let tableBot = tableOffsetTop + tableHeight
            let contReadHeight =
              $('.case-studies-posts-wrapper').height() +
              $('.case-studies-posts-wrapper').offset().top
            let sideBarScroll =
              $('.case-studies-filter').offset().top +
              $('.case-studies-filter').height()
            if (scrollPos >= firstTop) {
              if (st > lastScrollTop) {
                if (sideBarScroll >= contReadHeight - 10) {
                  sidebarLock(
                    $('.case-studies-wrapper .case-studies-filter-wrapper'),
                    '.case-studies-filter',
                    'locked',
                    headerHeight,
                    tableLeft,
                    tableWidth,
                    '',
                  )
                } else {
                  sidebarLock(
                    $('.case-studies-wrapper .case-studies-filter-wrapper'),
                    '.case-studies-filter',
                    'fixed',
                    headerHeight,
                    tableLeft,
                    tableWidth,
                    '',
                  )
                }
              } else {
                let sidebarHeight = $(
                  '.case-studies-wrapper .case-studies-filter-wrapper .case-studies-filter',
                ).height()
                let contBotCutoff = contReadHeight - sidebarHeight
                if (scrollBot <= contBotCutoff) {
                  sidebarLock(
                    $('.case-studies-wrapper .case-studies-filter-wrapper'),
                    '.case-studies-filter',
                    'fixed',
                    headerHeight,
                    tableLeft,
                    tableWidth,
                    '',
                  )
                }
              }
              lastScrollTop = st
            } else {
              sidebarLock(
                $('.case-studies-wrapper .case-studies-filter-wrapper'),
                '.case-studies-filter',
                'sticky',
                headerHeight,
                tableLeft,
                tableWidth,
                '',
              )
            }
          }
        }
      })
    }
    if ($('.btn-benefits-custom-header').length > 0) {
      $('.btn-benefits-custom-header')
        .off('click')
        .on('click', function (e) {
          if ($('#bill-case-studies-section').length > 0) {
            e.preventDefault()
            $('html, body').animate(
              { scrollTop: $('#bill-case-studies-section').offset().top - 80 },
              1000,
            )
            return false
          }
        })
    }
    if (
      $('.case-studies-video-gallery-wrapper .case-studies-video-gallery')
        .length > 0
    ) {
      if (
        $(
          '.case-studies-video-gallery-wrapper .case-studies-video-gallery .gallery-item',
        ).length == 3
      ) {
        $(
          '.case-studies-video-gallery-wrapper .case-studies-video-gallery .gallery-item',
        ).each(function () {
          $(this)
            .clone()
            .appendTo(
              $(
                '.case-studies-video-gallery-wrapper .case-studies-video-gallery',
              ),
            )
        })
      }
      $('.case-studies-video-gallery-wrapper .case-studies-video-gallery').on(
        'init',
        function (event, slick) {
          if (
            $(
              '.case-studies-video-gallery-wrapper .case-studies-video-gallery .video .case-slider-lazyload',
            ).length > 0
          ) {
            let mainImgSrc = $(
              '.case-studies-video-gallery .gallery-item.slick-current .case-slider-lazyload',
            ).data('orig-src')
            $(
              '.case-studies-video-gallery .gallery-item.slick-current .case-slider-lazyload',
            ).attr('src', mainImgSrc)
            $(window)
              .off(
                'load.caseStudiesVideoLazyLoad resize.caseStudiesVideoLazyLoad scroll.caseStudiesVideoLazyLoad',
              )
              .on(
                'load.caseStudiesVideoLazyLoad resize.caseStudiesVideoLazyLoad scroll.caseStudiesVideoLazyLoad',
                function (e) {
                  if (
                    $(
                      '.case-studies-video-gallery-wrapper .case-studies-video-gallery',
                    ).isInViewport()
                  ) {
                    if (
                      $(
                        '.case-studies-video-gallery .gallery-item.slick-current',
                      ).length > 0
                    ) {
                      if (
                        $(
                          '.case-studies-video-gallery .gallery-item.slick-current .case-slider-lazyload',
                        ).length > 0
                      ) {
                        let videoUrl = $(
                          '.case-studies-video-gallery .gallery-item.slick-current .case-slider-lazyload',
                        ).data('video-url')
                        let poster = $(
                          '.case-studies-video-gallery .gallery-item.slick-current .case-slider-lazyload',
                        ).data('poster-url')
                        $(window).off(
                          'load.caseStudiesVideoLazyLoad resize.caseStudiesVideoLazyLoad scroll.caseStudiesVideoLazyLoad',
                        )
                        setTimeout(function () {
                          $(
                            '.case-studies-video-gallery .gallery-item.slick-current .case-slider-lazyload',
                          ).remove()
                          $(
                            '.case-studies-video-gallery .gallery-item.slick-current .video',
                          ).append(
                            `<video class="lazy-video"playsinline="true"width="100%"style="object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
                              poster +
                              `"><source src="` +
                              videoUrl +
                              `"type="video/mp4"></video>`,
                          )
                          $(
                            '.case-studies-video-gallery .gallery-item.slick-current',
                          )
                            .addClass('video')
                            .removeClass('image')
                        }, 200)
                      }
                    }
                  }
                },
              )
          }
        },
      )
      $('.case-studies-video-gallery-wrapper .case-studies-video-gallery')
        .not('.slick-initialized')
        .slick({
          slidesToShow: 3,
          infinite: true,
          slidesToScroll: 1,
          autoplay: false,
          arrows: true,
          prevArrow: $('.gallery-navigation .slick-left'),
          nextArrow: $('.gallery-navigation .slick-right'),
          centerMode: true,
          centerPadding: '0px',
          variableWidth: false,
          useCSS: false,
          responsive: [
            { breakpoint: 1000, settings: { slidesToShow: 3 } },
            { breakpoint: 801, settings: { slidesToShow: 1 } },
          ],
        })
      $('.case-studies-video-gallery .gallery-item')
        .not('.slick-current')
        .find('video')
        .each(function () {
          $(this).get(0).pause()
        })
      $('.case-studies-video-gallery-wrapper .gallery-item')
        .off('click')
        .on('click', function () {
          if (!$(this).hasClass('slick-current')) {
            let slider = $(
              '.case-studies-video-gallery-wrapper .case-studies-video-gallery',
            )
            let changeSlide = parseInt($(this).data('slick-index'))
            slider.slick('slickGoTo', changeSlide)
            return false
          }
          let video = $(this).find('video')
          if (video.prop('muted')) {
            $('.gallery-item video').prop('muted', true)
            $(this).addClass('with-sound')
            video.prop('muted', false)
            $('.case-studies-video-gallery-wrapper').addClass('all-sound')
          } else {
            $('.gallery-item video').prop('muted', true)
            $(this).removeClass('with-sound')
            video.prop('muted', true)
            $('.case-studies-video-gallery-wrapper').removeClass('all-sound')
          }
        })
      $('.case-studies-video-gallery-wrapper .case-studies-video-gallery').on(
        'afterChange',
        function () {
          $('.case-studies-video-gallery .gallery-item')
            .not('.slick-current')
            .find('video')
            .each(function () {
              $(this).get(0).pause()
              $(this).get(0).currentTime = 0
            })
          $('.case-studies-video-gallery .slick-current')
            .find('video')
            .get(0)
            .play()
          if ($('.case-studies-video-gallery-wrapper').hasClass('all-sound')) {
            $('.case-studies-video-gallery .slick-current')
              .find('video')
              .prop('muted', false)
            $('.case-studies-video-gallery .slick-current').addClass(
              'with-sound',
            )
          }
        },
      )
      $('.case-studies-video-gallery-wrapper .case-studies-video-gallery').on(
        'beforeChange',
        function (event, slick, currentSlide, nextSlide) {
          $('.case-studies-video-gallery-wrapper .gallery-item')
            .off('click')
            .on('click', function () {
              if (!$(this).hasClass('slick-current')) {
                let slider = $(
                  '.case-studies-video-gallery-wrapper .case-studies-video-gallery',
                )
                let changeSlide = parseInt($(this).data('slick-index'))
                slider.slick('slickGoTo', changeSlide)
                return false
              }
              let video = $(this).find('video')
              if (video.prop('muted')) {
                $('.gallery-item video').prop('muted', true)
                $(this).addClass('with-sound')
                video.prop('muted', false)
                $('.case-studies-video-gallery-wrapper').addClass('all-sound')
              } else {
                $('.gallery-item video').prop('muted', true)
                $(this).removeClass('with-sound')
                video.prop('muted', true)
                $('.case-studies-video-gallery-wrapper').removeClass(
                  'all-sound',
                )
              }
            })
          let nextSlideDom = $(slick.$slides.get(nextSlide))
          let currentSlideDom = $(slick.$slides.get(currentSlide))
          if (nextSlideDom.find('video').length < 1) {
            nextSlideDom.find('.case-slider-lazyload').hide()
            let videoUrl = nextSlideDom
              .find('.case-slider-lazyload')
              .data('video-url')
            let posterUrl = nextSlideDom
              .find('.case-slider-lazyload')
              .data('poster-url')
            nextSlideDom.find('.case-slider-lazyload').remove()
            nextSlideDom
              .find('.video')
              .append(
                `<video class="lazy-video"playsinline="true"width="100%"style="object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
                  posterUrl +
                  `"><source src="` +
                  videoUrl +
                  `"type="video/mp4"></video>`,
              )
            nextSlideDom.removeClass('image').addClass('video')
          }
          currentSlideDom.find('video').prop('muted', true)
          currentSlideDom.removeClass('with-sound')
          $('.case-studies-gallery-navigation .slick-count .count-left').text(
            nextSlideDom.data('index-id'),
          )
        },
      )
    }
    if ($('.bar-navigation.influencer-accordion').length > 0) {
      $(window)
        .off(
          'load.accordionLazyLoad resize.accordionLazyLoad scroll.accordionLazyLoad',
        )
        .on(
          'load.accordionLazyLoad resize.accordionLazyLoad scroll.accordionLazyLoad',
          function (e) {
            if (
              $(
                '.bar-navigation.influencer-accordion .nav-item.active',
              ).isInViewport()
            ) {
              if (
                $(
                  '.bar-navigation.influencer-accordion .nav-item.active .lazyload-video',
                ).length > 0
              ) {
                let poster = $(
                  '.bar-navigation.influencer-accordion .nav-item.active .lazyload-video',
                ).attr('src')
                let videoUrl = $(
                  '.bar-navigation.influencer-accordion .nav-item.active .lazyload-video',
                ).data('video-url')
                $(
                  '.bar-navigation.influencer-accordion .nav-item.active .lazyload-video',
                ).replaceWith(
                  `<video class="video-player ads-accordion"poster="` +
                    poster +
                    `"type="video/mp4"autoplay="true"preload="true"muted="true"loop="true"playsinline="true"><source src="` +
                    videoUrl +
                    `"type="video/mp4"></video>`,
                )
                $(window).off(
                  'load.accordionLazyLoad resize.accordionLazyLoad scroll.accordionLazyLoad',
                )
              }
            }
          },
        )
    }
    if ($('.isolated-video-gallery-wrapper').length > 0) {
      $('.isolated-video-gallery-wrapper .isolated-video-gallery').on(
        'init',
        function (event, slick) {
          let curSlider = slick.$slider
          let mainImgSrc = curSlider
            .find('.gallery-item.slick-current .slider-lazy-load')
            .data('orig-src')
          curSlider
            .find('.gallery-item.slick-current .slider-lazy-load')
            .attr('src', mainImgSrc)
          if (
            !curSlider
              .closest('.isolated-video-slider-tabbed')
              .hasClass('active')
          ) {
            return
          }
          $(window)
            .off(
              'load.tabbedVideoSliderLazyload resize.tabbedVideoSliderLazyload scroll.tabbedVideoSliderLazyload',
            )
            .on(
              'load.tabbedVideoSliderLazyload resize.tabbedVideoSliderLazyload scroll.tabbedVideoSliderLazyload',
              function (e) {
                if (curSlider.isInViewport()) {
                  if (
                    $('.isolated-video-gallery .gallery-item.slick-current')
                      .length > 0
                  ) {
                    if (
                      $(
                        '.isolated-video-gallery .gallery-item.slick-current .slider-lazy-load',
                      ).length > 0
                    ) {
                      let videoUrl = curSlider
                        .find('.gallery-item.slick-current .slider-lazy-load')
                        .data('video-url')
                      let poster = curSlider
                        .find('.gallery-item.slick-current .slider-lazy-load')
                        .data('poster-url')
                      $(window).off(
                        'load.tabbedVideoSliderLazyload resize.tabbedVideoSliderLazyload scroll.tabbedVideoSliderLazyload',
                      )
                      setTimeout(function () {
                        curSlider
                          .find('.gallery-item.slick-current .slider-lazy-load')
                          .remove()
                        curSlider
                          .find('.gallery-item.slick-current .video')
                          .append(
                            `<video class="lazy-video"playsinline="true"width="100%"style="object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
                              poster +
                              `"><source src="` +
                              videoUrl +
                              `"type="video/mp4"></video>`,
                          )
                      }, 200)
                    }
                  }
                }
              },
            )
        },
      )
      $('.isolated-video-tabs .isolated-video-tab')
        .off('click')
        .on('click', function () {
          let index = $(this).data('index')
          $('.isolated-video-tabs .isolated-video-tab').removeClass('active')
          $(this).addClass('active')
          if ($('.isolated-video-slider-tabbed.index-' + index).length > 0) {
            $('.isolated-video-slider-tabbed').removeClass('active')
            $(
              '.isolated-video-slider-tabbed .isolated-video-gallery-wrapper',
            ).removeClass('all-sound')
            $(
              '.isolated-video-slider-tabbed .isolated-video-gallery-wrapper .gallery-item',
            ).removeClass('with-sound')
            $(
              '.isolated-video-slider-tabbed .isolated-video-gallery-wrapper .gallery-item video',
            ).prop('muted', true)
            $('.isolated-video-slider-tabbed.index-' + index).addClass('active')
            $('.isolated-video-slider-tabbed.index-' + index)
              .find('.isolated-video-gallery')
              .slick('setPosition')
            if (
              $('.isolated-video-slider-tabbed.index-' + index).find(
                '.isolated-video-gallery .slick-current .slider-lazy-load',
              ).length > 0
            ) {
              let videoUrl = $('.isolated-video-slider-tabbed.index-' + index)
                .find(
                  '.isolated-video-gallery .slick-current .slider-lazy-load',
                )
                .data('video-url')
              let poster = $('.isolated-video-slider-tabbed.index-' + index)
                .find(
                  '.isolated-video-gallery .slick-current .slider-lazy-load',
                )
                .data('poster-url')
              setTimeout(function () {
                $('.isolated-video-slider-tabbed.index-' + index)
                  .find(
                    '.isolated-video-gallery .slick-current .slider-lazy-load',
                  )
                  .remove()
                $('.isolated-video-slider-tabbed.index-' + index)
                  .find('.isolated-video-gallery .slick-current .video')
                  .append(
                    `<video class="lazy-video"playsinline="true"width="100%"style="object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
                      poster +
                      `"><source src="` +
                      videoUrl +
                      `"type="video/mp4"></video>`,
                  )
              }, 200)
            }
          }
        })
      $('.isolated-video-gallery-wrapper').each(function () {
        let galleryWrap = $(this)
        if ($(this).find('.isolated-video-gallery .gallery-item').length == 3) {
          let thisGallery = $(this)
          $(this)
            .find('.isolated-video-gallery .gallery-item')
            .each(function () {
              $(this)
                .clone()
                .appendTo($(thisGallery).find('.isolated-video-gallery'))
            })
        }
        $(this)
          .find('.isolated-video-gallery')
          .not('.slick-initialized')
          .slick({
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 1,
            autoplay: false,
            arrows: true,
            prevArrow: $(this).find('.isolated-gallery-navigation .slick-left'),
            nextArrow: $(this).find(
              '.isolated-gallery-navigation .slick-right',
            ),
            centerMode: true,
            centerPadding: '0px',
            variableWidth: false,
            useCSS: false,
            responsive: [
              { breakpoint: 1000, settings: { slidesToShow: 3 } },
              { breakpoint: 801, settings: { slidesToShow: 1 } },
            ],
          })
        $(this)
          .find('.isolated-video-gallery .gallery-item')
          .off('click.videoClick')
          .on('click.videoClick', function () {
            let slider = $(this).closest('.isolated-video-gallery')
            if (!$(this).hasClass('slick-current')) {
              let changeSlide = parseInt($(this).data('slick-index'))
              slider.slick('slickGoTo', changeSlide)
              return false
            }
            let video = $(this).find('video')
            if (video.prop('muted')) {
              $(slider).find('.gallery-item video').prop('muted', true)
              $(this).addClass('with-sound')
              video.prop('muted', false)
              $(slider).parent().addClass('all-sound')
            } else {
              $(slider).find('.gallery-item video').prop('muted', true)
              $(this).removeClass('with-sound')
              video.prop('muted', true)
              $(slider).parent().removeClass('all-sound')
            }
          })
        $(this)
          .find('.isolated-video-gallery')
          .on('afterChange', function () {
            $(galleryWrap)
              .find('.isolated-video-gallery .gallery-item')
              .not('.slick-current')
              .find('video')
              .each(function () {
                $(this).get(0).pause()
                $(this).get(0).currentTime = 0
              })
            if (
              $(galleryWrap).find(
                '.isolated-video-gallery .slick-current video',
              ).length > 0
            ) {
              $(galleryWrap)
                .find('.isolated-video-gallery .slick-current video')
                .get(0)
                .play()
            }
            if ($(galleryWrap).hasClass('all-sound')) {
              $(galleryWrap)
                .find('.isolated-video-gallery .slick-current')
                .find('video')
                .prop('muted', false)
              $(galleryWrap)
                .find('.isolated-video-gallery .slick-current')
                .addClass('with-sound')
            }
          })
        $(this)
          .find('.isolated-video-gallery')
          .on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            $(galleryWrap)
              .find('.gallery-item')
              .off('click')
              .on('click', function () {
                let slider = $(galleryWrap).find('.isolated-video-gallery')
                if (!$(this).hasClass('slick-current')) {
                  let changeSlide = parseInt($(this).data('slick-index'))
                  slider.slick('slickGoTo', changeSlide)
                  return false
                }
                let video = $(this).find('video')
                if (video.prop('muted')) {
                  $(slider).find('.gallery-item video').prop('muted', true)
                  $(this).addClass('with-sound')
                  video.prop('muted', false)
                  $(slider).parent().addClass('all-sound')
                } else {
                  $(slider).find('.gallery-item video').prop('muted', true)
                  $(this).removeClass('with-sound')
                  video.prop('muted', true)
                  $(slider).parent().removeClass('all-sound')
                }
              })
            let nextSlideDom = $(slick.$slides.get(nextSlide))
            let currentSlideDom = $(slick.$slides.get(currentSlide))
            if (nextSlideDom.find('video').length < 1) {
              nextSlideDom.find('.slider-lazy-load').hide()
              let videoUrl = nextSlideDom
                .find('.slider-lazy-load')
                .data('video-url')
              let posterUrl = nextSlideDom
                .find('.slider-lazy-load')
                .data('poster-url')
              nextSlideDom.find('.slider-lazy-load').remove()
              nextSlideDom
                .find('.video')
                .append(
                  `<video class="lazy-video"playsinline="true"width="100%"style="object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
                    posterUrl +
                    `"><source src="` +
                    videoUrl +
                    `"type="video/mp4"></video>`,
                )
            }
            currentSlideDom.find('video').prop('muted', true)
            currentSlideDom.removeClass('with-sound')
            $(galleryWrap)
              .find('.isolated-gallery-navigation .slick-count .count-left')
              .text(nextSlideDom.data('index-id'))
          })
      })
    }
    if ($('.boost-ad-second-block.lazyload-media').length > 0) {
      $(window)
        .off(
          'load.adsBoostAdsVideoLazyLoad resize.adsBoostAdsVideoLazyLoad scroll.adsBoostAdsVideoLazyLoad',
        )
        .on(
          'load.adsBoostAdsVideoLazyLoad resize.adsBoostAdsVideoLazyLoad scroll.adsBoostAdsVideoLazyLoad',
          function (e) {
            if (
              $(
                '.boost-ad-second-block.lazyload-media .load-media',
              ).isInViewport()
            ) {
              let adsVideoUrl = $(
                '.boost-ad-second-block.lazyload-media .load-media',
              ).data('video-url')
              let adsPosterUrl = $(
                '.boost-ad-second-block.lazyload-media .load-media',
              ).data('poster-url')
              $('.boost-ad-second-block.lazyload-media').append(
                `<video autoplay muted loop playsinline="true"poster="` +
                  adsPosterUrl +
                  `"><source src="` +
                  adsVideoUrl +
                  `"type="video/mp4"></video>`,
              )
              $('.boost-ad-second-block.lazyload-media .load-media').remove()
              $(window).off(
                'load.adsBoostAdsVideoLazyLoad resize.adsBoostAdsVideoLazyLoad scroll.adsBoostAdsVideoLazyLoad',
              )
            }
          },
        )
    }
    if ($('.other-platform-big-block-video.lazyload-media-1').length > 0) {
      $(window)
        .off(
          'load.platformsVideoLazyLoadFirst resize.platformsVideoLazyLoadFirst scroll.platformsVideoLazyLoadFirst',
        )
        .on(
          'load.platformsVideoLazyLoadFirst resize.platformsVideoLazyLoadFirst scroll.platformsVideoLazyLoadFirst',
          function (e) {
            if (
              $(
                '.other-platform-big-block-video.lazyload-media-1',
              ).isInViewport()
            ) {
              let platformVideoUrl = $(
                '.other-platform-big-block-video.lazyload-media-1',
              ).data('video-url')
              let posterUrl = $(
                '.other-platform-big-block-video.lazyload-media-1',
              ).data('poster-url')
              $('.other-platform-big-block-video.lazyload-media-1').append(
                `<video class="other-platform-big-block-videos"poster="` +
                  posterUrl +
                  `"type="video/mp4"autoplay=""muted=""loop=""playsinline="true"><source src="` +
                  platformVideoUrl +
                  `"type="video/mp4"></video>`,
              )
              $(
                '.other-platform-big-block-video.lazyload-media-1 img.load-lazy',
              ).remove()
              $(window).off(
                'load.platformsVideoLazyLoadFirst resize.platformsVideoLazyLoadFirst scroll.platformsVideoLazyLoadFirst',
              )
            }
          },
        )
    }
    if ($('.other-platform-big-block-video.lazyload-media-2').length > 0) {
      $(window)
        .off(
          'load.platformsVideoLazyLoadSecond resize.platformsVideoLazyLoadSecond scroll.platformsVideoLazyLoadSecond',
        )
        .on(
          'load.platformsVideoLazyLoadSecond resize.platformsVideoLazyLoadSecond scroll.platformsVideoLazyLoadSecond',
          function (e) {
            if (
              $(
                '.other-platform-big-block-video.lazyload-media-2',
              ).isInViewport()
            ) {
              let platformVideoUrl = $(
                '.other-platform-big-block-video.lazyload-media-2',
              ).data('video-url')
              let posterUrl = $(
                '.other-platform-big-block-video.lazyload-media-2',
              ).data('poster-url')
              $('.other-platform-big-block-video.lazyload-media-2').append(
                `<video class="other-platform-big-block-videos"poster="` +
                  posterUrl +
                  `"type="video/mp4"autoplay=""muted=""loop=""playsinline="true"><source src="` +
                  platformVideoUrl +
                  `"type="video/mp4"></video>`,
              )
              $(
                '.other-platform-big-block-video.lazyload-media-2 img.load-lazy',
              ).remove()
              $(window).off(
                'load.platformsVideoLazyLoadSecond resize.platformsVideoLazyLoadSecond scroll.platformsVideoLazyLoadSecond',
              )
            }
          },
        )
    }
    if (
      $('.influencers-video-gallery-wrapper .influencers-video-gallery')
        .length > 0
    ) {
      if (
        $(
          '.influencers-video-gallery-wrapper .influencers-video-gallery .gallery-item',
        ).length == 3
      ) {
        $(
          '.influencers-video-gallery-wrapper .influencers-video-gallery .gallery-item',
        ).each(function () {
          $(this)
            .clone()
            .appendTo(
              $(
                '.influencers-video-gallery-wrapper .influencers-video-gallery',
              ),
            )
        })
      }
      $('.influencers-video-gallery-wrapper .influencers-video-gallery').on(
        'init',
        function (event, slick) {
          let mainImgSrc = $(
            '.influencers-video-gallery .gallery-item.slick-current .slider-lazy-load',
          ).data('orig-src')
          $(
            '.influencers-video-gallery .gallery-item.slick-current .slider-lazy-load',
          ).attr('src', mainImgSrc)
          $(window)
            .off(
              'load.influencerVideoLazyLoad resize.influencerVideoLazyLoad scroll.influencerVideoLazyLoad',
            )
            .on(
              'load.influencerVideoLazyLoad resize.influencerVideoLazyLoad scroll.influencerVideoLazyLoad',
              function (e) {
                if (
                  $(
                    '.influencers-video-gallery-wrapper .influencers-video-gallery',
                  ).isInViewport()
                ) {
                  if (
                    $('.influencers-video-gallery .gallery-item.slick-current')
                      .length > 0
                  ) {
                    if (
                      $(
                        '.influencers-video-gallery .gallery-item.slick-current .slider-lazy-load',
                      ).length > 0
                    ) {
                      let videoUrl = $(
                        '.influencers-video-gallery .gallery-item.slick-current .slider-lazy-load',
                      ).data('video-url')
                      let poster = $(
                        '.influencers-video-gallery .gallery-item.slick-current .slider-lazy-load',
                      ).data('poster-url')
                      $(window).off(
                        'load.influencerVideoLazyLoad resize.influencerVideoLazyLoad scroll.influencerVideoLazyLoad',
                      )
                      setTimeout(function () {
                        $(
                          '.influencers-video-gallery .gallery-item.slick-current .slider-lazy-load',
                        ).remove()
                        $(
                          '.influencers-video-gallery .gallery-item.slick-current .video',
                        ).append(
                          `<video class="lazy-video"playsinline="true"width="100%"style="object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
                            poster +
                            `"><source src="` +
                            videoUrl +
                            `"type="video/mp4"></video>`,
                        )
                      }, 200)
                    }
                  }
                }
              },
            )
        },
      )
      $('.influencers-video-gallery-wrapper .influencers-video-gallery')
        .not('.slick-initialized')
        .slick({
          slidesToShow: 3,
          infinite: true,
          slidesToScroll: 1,
          autoplay: false,
          arrows: true,
          prevArrow: $('.gallery-navigation .slick-left'),
          nextArrow: $('.gallery-navigation .slick-right'),
          centerMode: true,
          centerPadding: '0px',
          variableWidth: false,
          useCSS: false,
          responsive: [
            { breakpoint: 1000, settings: { slidesToShow: 3 } },
            { breakpoint: 801, settings: { slidesToShow: 1 } },
          ],
        })
      $('.influencers-video-gallery-wrapper .gallery-item')
        .off('click')
        .on('click', function () {
          if (!$(this).hasClass('slick-current')) {
            let slider = $(
              '.influencers-video-gallery-wrapper .influencers-video-gallery',
            )
            let changeSlide = parseInt($(this).data('slick-index'))
            slider.slick('slickGoTo', changeSlide)
            return false
          }
          let video = $(this).find('video')
          if (video.prop('muted')) {
            $('.gallery-item video').prop('muted', true)
            $(this).addClass('with-sound')
            video.prop('muted', false)
            $('.influencers-video-gallery-wrapper').addClass('all-sound')
          } else {
            $('.gallery-item video').prop('muted', true)
            $(this).removeClass('with-sound')
            video.prop('muted', true)
            $('.influencers-video-gallery-wrapper').removeClass('all-sound')
          }
        })
      $('.influencers-video-gallery-wrapper .influencers-video-gallery').on(
        'afterChange',
        function (event, slick, currentSlide, nextSlide) {
          $('.influencers-video-gallery .gallery-item')
            .not('.slick-current')
            .find('video')
            .each(function () {
              $(this).get(0).pause()
              $(this).get(0).currentTime = 0
            })
          if (
            $('.influencers-video-gallery .slick-current').find('video')
              .length > 0
          ) {
            $('.influencers-video-gallery .slick-current')
              .find('video')
              .get(0)
              .play()
          }
          if ($('.influencers-video-gallery-wrapper').hasClass('all-sound')) {
            $('.influencers-video-gallery .slick-current')
              .find('video')
              .prop('muted', false)
            $('.influencers-video-gallery .slick-current').addClass(
              'with-sound',
            )
          }
        },
      )
      $('.influencers-video-gallery-wrapper .influencers-video-gallery').on(
        'beforeChange',
        function (event, slick, currentSlide, nextSlide) {
          $('.influencers-video-gallery-wrapper .gallery-item')
            .off('click')
            .on('click', function () {
              if (!$(this).hasClass('slick-current')) {
                let slider = $(
                  '.influencers-video-gallery-wrapper .influencers-video-gallery',
                )
                let changeSlide = parseInt($(this).data('slick-index'))
                slider.slick('slickGoTo', changeSlide)
                return false
              }
              let video = $(this).find('video')
              if (video.prop('muted')) {
                $('.gallery-item video').prop('muted', true)
                $(this).addClass('with-sound')
                video.prop('muted', false)
                $('.influencers-video-gallery-wrapper').addClass('all-sound')
              } else {
                $('.gallery-item video').prop('muted', true)
                $(this).removeClass('with-sound')
                video.prop('muted', true)
                $('.influencers-video-gallery-wrapper').removeClass('all-sound')
              }
            })
          let nextSlideDom = $(slick.$slides.get(nextSlide))
          let currentSlideDom = $(slick.$slides.get(currentSlide))
          if (nextSlideDom.find('video').length < 1) {
            nextSlideDom.find('.slider-lazy-load').hide()
            let videoUrl = nextSlideDom
              .find('.slider-lazy-load')
              .data('video-url')
            let posterUrl = nextSlideDom
              .find('.slider-lazy-load')
              .data('poster-url')
            nextSlideDom.find('.slider-lazy-load').remove()
            nextSlideDom
              .find('.video')
              .append(
                `<video class="lazy-video"playsinline="true"width="100%"style="object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
                  posterUrl +
                  `"><source src="` +
                  videoUrl +
                  `"type="video/mp4"></video>`,
              )
          }
          currentSlideDom.find('video').prop('muted', true)
          currentSlideDom.removeClass('with-sound')
          $('.influencers-gallery-navigation .slick-count .count-left').text(
            nextSlideDom.data('index-id'),
          )
        },
      )
    }
    if ($('.influencer-accordion').length > 0) {
      $('.influencer-accordion ul.nav-list li.nav-item').on('click', function (
        e,
      ) {
        if ($(window).width() > 1024) {
          $('.influencer-accordion ul.nav-list li.nav-item').removeClass(
            'active',
          )
          $(this).addClass('active')
          if ($(this).find('.lazyload-video').length > 0) {
            if ($(this).find('.lazyload-video').length > 0) {
              let lazyLoadImg = $(this).find('.lazyload-video')
              let poster = lazyLoadImg.attr('src')
              let videoUrl = lazyLoadImg.data('video-url')
              lazyLoadImg.replaceWith(
                `<video class="video-player ads-accordion"poster="` +
                  poster +
                  `"type="video/mp4"autoplay="true"preload="true"muted="true"loop="true"playsinline="true"><source src="` +
                  videoUrl +
                  `"type="video/mp4"></video>`,
              )
              $(this).find('video')[0].play()
            }
          }
        } else {
          if ($(this).hasClass('active')) {
            if ($(e.target).hasClass('success-stories-link')) {
              window, (location.href = $(e.target).attr('href'))
            }
            return false
          }
          $('.influencer-accordion ul.nav-list li.nav-item').removeClass(
            'active',
          )
          $(this).addClass('active')
          $(
            '.influencer-accordion ul.nav-list li.nav-item .main-container-accordion',
          ).hide()
          let target = $(this)
          $(this).find('.main-container-accordion').show()
          $('html, body')
            .stop()
            .animate({ scrollTop: target.offset().top - 80 }, 500, function () {
              if (target.find('.lazyload-video').length > 0) {
                if (target.find('.lazyload-video').length > 0) {
                  let lazyLoadImg = target.find('.lazyload-video')
                  let poster = lazyLoadImg.attr('src')
                  let videoUrl = lazyLoadImg.data('video-url')
                  lazyLoadImg.replaceWith(
                    `<video class="video-player ads-accordion"poster="` +
                      poster +
                      `"type="video/mp4"autoplay="true"preload="true"muted="true"loop="true"playsinline="true"><source src="` +
                      videoUrl +
                      `"type="video/mp4"></video>`,
                  )
                }
              }
            })
        }
      })
    }
    if (
      $('.toggle-inside .toggle-more').length > 0 &&
      $('.toggle-inside #show-more').length > 0
    ) {
      $('.toggle-inside #show-more')
        .off('click.showAdsText')
        .on('click.showAdsText', function (e) {
          e.preventDefault()
          if ($(this).hasClass('open')) {
            $(this).removeClass('open')
            $('.toggle-inside .toggle-more').slideUp()
            $(this).children('div').text('Show more')
            $(
              '.for-justify-content .fusion-builder-row.fusion-row.fusion-flex-align-items-center',
            ).removeClass('align-top')
          } else {
            $(this).addClass('open')
            $('.toggle-inside .toggle-more').slideDown()
            $(this).children('div').text('Show less')
            $(
              '.for-justify-content .fusion-builder-row.fusion-row.fusion-flex-align-items-center',
            ).addClass('align-top')
          }
          return false
        })
    }
    if ($('.sound-toggle-wrapper .boost-ad-second-block').length > 0) {
      $('.sound-toggle-wrapper .boost-ad-second-block')
        .off('click.boostAdsToggleSound')
        .on('click.boostAdsToggleSound', function () {
          if ($(this).hasClass('with-sound')) {
            $(this).removeClass('with-sound')
            $(this).find('video').prop('muted', true)
          } else {
            $(this).addClass('with-sound')
            $(this).find('video').prop('muted', false)
          }
        })
    }
    if ($('.accordion-block .video-div-accordion').length > 0) {
      $('.accordion-block .video-div-accordion')
        .off('click.toggleAdsAccordionSound')
        .on('click.toggleAdsAccordionSound', function () {
          if ($(this).hasClass('with-sound')) {
            $(this).removeClass('with-sound')
            $(this).find('video').prop('muted', true)
          } else {
            $(this).addClass('with-sound')
            $(this).find('video').prop('muted', false)
          }
        })
      $('.influencer-accordion .accordion-block')
        .off('click.toggleAdsAccordionTabSound')
        .on('click.toggleAdsAccordionTabSound', function () {
          $('.accordion-block .video-player.ads-accordion').prop('muted', true)
          if ($(this).find('.video-div-accordion').hasClass('with-sound')) {
            $(this).find('.video-div-accordion video').prop('muted', false)
          }
        })
    }
    $.fn.isInViewport = function () {
      let elementTop = $(this).offset().top
      let elementBottom = elementTop + $(this).outerHeight()
      let viewportTop = $(window).scrollTop()
      let viewportBottom = viewportTop + $(window).height()
      return elementBottom > viewportTop && elementTop < viewportBottom
    }
    if ($('.faq-scriptless').length > 0) {
      $('.answer1').hide()
      $('.question1').click(function () {
        let $answer = $(this).siblings('.answer1')
        let $faq = $(this).parent('.faq1')
        let isActive = $(this).hasClass('active')
        $('.answer1').slideUp('fast')
        $('.question1').removeClass('active')
        $('.faq1').removeClass('rotate')
        if (!isActive) {
          $(this).addClass('active')
          $answer.slideDown('fast')
          $faq.addClass('rotate')
        }
      })
    }
    if ($('.text-with-img-section .hero-media.with-image').length > 0) {
      $('.text-with-img-section')
        .find('.btn-custom.next-width')
        .parent()
        .addClass('affiliate-button')
    }
    if ($('.video-cu .video-wrapper .lazyload-index-video').length > 0) {
      $(window)
        .off('load.indexLazyLoad resize.indexLazyLoad scroll.indexLazyLoad')
        .on(
          'load.indexLazyLoad resize.indexLazyLoad scroll.indexLazyLoad',
          function (e) {
            if (
              $('.video-cu .video-wrapper .lazyload-index-video').isInViewport()
            ) {
              let indexVideoUrl = $(
                '.video-cu .video-wrapper .lazyload-index-video',
              ).data('video-url')
              let indexPoster = $(
                '.video-cu .video-wrapper .lazyload-index-video',
              ).data('poster')
              $('.video-cu .video-wrapper').prepend(
                `<video playsinline="true"poster="` +
                  indexPoster +
                  `"width="100%"style="object-fit: cover;"autoplay="true"muted="true"loop="true"preload="auto"><source src="` +
                  indexVideoUrl +
                  `"type="video/mp4"></video>`,
              )
              $('.video-cu .video-wrapper .lazyload-index-video').remove()
              $(window).off(
                'load.indexLazyLoad resize.indexLazyLoad scroll.indexLazyLoad',
              )
            }
          },
        )
    }
    if ($('.dekstop_menu .main-nav .item').length > 0) {
      $('.dekstop_menu .main-nav .item')
        .not('.bigmenu')
        .off('click.forceHref')
        .on('click.forceHref', function (e) {
          if (e.target !== e.currentTarget) return
          if ($(this).children('a.title').length > 0) {
            $(this).children('a.title')[0].click()
          }
        })
    }
    if (
      $('.fusion-selfhosted-video.custom-video.lazy .lazyload-custom-video')
        .length > 0
    ) {
      $(window)
        .off(
          'load.customVideoLazyLoad resize.customVideoLazyLoad scroll.customVideoLazyLoad',
        )
        .on(
          'load.customVideoLazyLoad resize.customVideoLazyLoad scroll.customVideoLazyLoad',
          function (e) {
            if (
              $(
                '.fusion-selfhosted-video.custom-video.lazy .lazyload-custom-video',
              ).isInViewport()
            ) {
              let indexVideoUrl = $(
                '.fusion-selfhosted-video.custom-video.lazy .lazyload-custom-video',
              ).data('video-url')
              let indexPoster = $(
                '.fusion-selfhosted-video.custom-video.lazy .lazyload-custom-video',
              ).data('poster')
              $(
                '.fusion-selfhosted-video.custom-video.lazy .lazyload-custom-video',
              ).prepend(
                `<video playsinline="true"poster="` +
                  indexPoster +
                  `"width="100%"style="object-fit: cover;"autoplay="true"muted="true"loop="true"preload="auto"><source src="` +
                  indexVideoUrl +
                  `"type="video/mp4"></video>`,
              )
              $(
                '.fusion-selfhosted-video.custom-video.lazy .lazyload-custom-video img',
              ).remove()
              $(window).off(
                'load.customVideoLazyLoad resize.customVideoLazyLoad scroll.customVideoLazyLoad',
              )
            }
          },
        )
    }
    if ($('.faq-sticky-wrapper .sticky-scroll').length > 0) {
      let sideWidth =
        $('.sticky-scroll').parent().width() - $('.faq-scroll-right').width()
      let sidePos = $('.sticky-scroll').parent().offset().left
      $(window)
        .off('scroll.stickyFaqHeading')
        .on('scroll.stickyFaqHeading', function () {
          if ($(window).width() > 640) {
            let headingPosition = $(
              '.faq-sticky-wrapper .sticky-scroll',
            ).position().top
            let parentHeight = $('.faq-sticky-wrapper .sticky-scroll')
              .parent()
              .height()
            let headerHeight = $('.header_billo').outerHeight()
            if ($('#wrapper').hasClass('with-notification')) {
              headerHeight = $('.header_billo').outerHeight() + 30
            }
            let parentOffset =
              $('.faq-sticky-wrapper .sticky-scroll').parent().offset().top -
              headerHeight
            let windowHeight = $(window).height()
            let windowScroll = $(window).scrollTop()
            let bottomThreshold = parentOffset + parentHeight - 200
            if (windowScroll > parentOffset && windowScroll < bottomThreshold) {
              $('.faq-sticky-wrapper .sticky-scroll')
                .removeClass('bottom')
                .addClass('fixed')
              let textPos = windowScroll - parentOffset
              $('.faq-sticky-wrapper .sticky-scroll').css({
                top: headerHeight + 'px',
                left: sidePos + 'px',
                width: sideWidth + 'px',
              })
            } else if (windowScroll >= bottomThreshold) {
              $('.faq-sticky-wrapper .sticky-scroll')
                .removeClass('fixed')
                .addClass('bottom')
              $('.faq-sticky-wrapper .sticky-scroll').css({
                top: 'unset',
                left: '0',
                width: sideWidth + 'px',
                bottom: '0',
              })
            } else {
              $('.faq-sticky-wrapper .sticky-scroll').removeClass(
                'fixed bottom',
              )
              $('.faq-sticky-wrapper .sticky-scroll').css({
                top: '0',
                left: '0',
                width: sideWidth + 'px',
                bottom: 'unset',
              })
            }
          }
        })
      $(window)
        .off('resize.faqStickyRecalc')
        .on('resize.faqStickyRecalc', function () {
          let sideWidth =
            $('.sticky-scroll').parent().width() -
            $('.faq-scroll-right').width()
          let sidePos = $('.sticky-scroll').parent().offset().left
          $(window)
            .off('scroll.stickyFaqHeading')
            .on('scroll.stickyFaqHeading', function () {
              if ($(window).width() > 640) {
                let headingPosition = $(
                  '.faq-sticky-wrapper .sticky-scroll',
                ).position().top
                let parentHeight = $('.faq-sticky-wrapper .sticky-scroll')
                  .parent()
                  .height()
                let headerHeight = $('.header_billo').outerHeight()
                if ($('#wrapper').hasClass('with-notification')) {
                  headerHeight = $('.header_billo').outerHeight() + 30
                }
                let parentOffset =
                  $('.faq-sticky-wrapper .sticky-scroll').parent().offset()
                    .top - headerHeight
                let windowHeight = $(window).height()
                let windowScroll = $(window).scrollTop()
                let bottomThreshold = parentOffset + parentHeight - 200
                if (
                  windowScroll > parentOffset &&
                  windowScroll < bottomThreshold
                ) {
                  $('.faq-sticky-wrapper .sticky-scroll')
                    .removeClass('bottom')
                    .addClass('fixed')
                  let textPos = windowScroll - parentOffset
                  $('.faq-sticky-wrapper .sticky-scroll').css({
                    top: headerHeight + 'px',
                    left: sidePos + 'px',
                    width: sideWidth + 'px',
                  })
                } else if (windowScroll >= bottomThreshold) {
                  $('.faq-sticky-wrapper .sticky-scroll')
                    .removeClass('fixed')
                    .addClass('bottom')
                  $('.faq-sticky-wrapper .sticky-scroll').css({
                    top: 'unset',
                    left: '0',
                    width: sideWidth + 'px',
                    bottom: '0',
                  })
                } else {
                  $('.faq-sticky-wrapper .sticky-scroll').removeClass(
                    'fixed bottom',
                  )
                  $('.faq-sticky-wrapper .sticky-scroll').css({
                    top: '0',
                    left: '0',
                    width: sideWidth + 'px',
                    bottom: 'unset',
                  })
                }
              }
            })
        })
    }
    if ($('#nf-form-7-cont').length > 0) {
      var ninjaFormVideoSelectField = Marionette.Object.extend({
        initialize: function () {
          this.listenTo(
            nfRadio.channel('fields'),
            'render:view',
            this.renderView,
          )
        },
        renderView: function (view) {
          if (
            view.model.get('key').indexOf('choose_the_video_s_editing_style') >
            -1
          ) {
            let el = jQuery(view.el).find('.nf-element')
            el.siblings('label').each(function () {
              $(this).contents().eq(0).wrap('<span class="label-text"/>')
              if (
                $(this).find('img').length > 0 &&
                $(this).find('img').attr('src').indexOf('.mp4') > -1
              ) {
                let image = $(this).find('img')
                let videoUrl = $(this).find('img').attr('src')
                $(this).append(
                  `<video class="lazy-video active"playsinline="true"width="100%"style="display: none; object-fit: contain;"autoplay="false"muted="true"loop="true"preload="auto"><source src="` +
                    videoUrl +
                    `"></video>`,
                )
                $(this).find('video.lazy-video')[0].onloadeddata = function () {
                  $(this)[0].play()
                  $(this).show()
                  image.remove()
                }
              }
            })
          }
        },
      })
      new ninjaFormVideoSelectField()
    }
    if (
      $('.main-section-price-mobile .price-boxes-div .price-box-mobile')
        .length > 0
    ) {
      $('.main-section-price-mobile .price-boxes-div .price-box-mobile')
        .off('click.mobilePriceBox')
        .on('click.mobilePriceBox', function () {
          $('.main-section-price-mobile .price-boxes-div .price-box-mobile')
            .not($(this))
            .removeClass('active')
          $(this).addClass('active')
          let url = $(this).data('url')
          $('.price-boxes-div .price-button-div-mobile a').attr('href', url)
        })
    }
    if ($('.aditional-info-pr-p.popup-call a').length > 0) {
      let popupText = `<p>When you buy a pack,&nbsp;funds are added to your Billo balance for ordering videos and other services.&nbsp;Select packs include a bonus added on top of your purchase.&nbsp;For example,the Professional pack includes a $450 bonus,&nbsp;giving you a total of $2,950 in your Billo balance instead of $2,500.</p><p>This balance can then be used to purchase a variety of videos and services,&nbsp;including:</p>`
      if (typeof popupDetailsOverride !== 'undefined') {
        let paragraphs = popupDetailsOverride.split(/\r?\n\r?\n/)
        let parcedText = paragraphs
          .map(function (paragraph) {
            return '<p>' + paragraph + '</p>'
          })
          .join('')
        popupText = parcedText
      }
      $('body').append(
        `<div class="pricing-popup-wrapper"><div class="pop-up-pricing"><div class="close-x"><img src="https://billo.app/wp-content/uploads/2024/08/Close-24.svg"alt=""></div><div class="text-pop-up-div"><h2>Details</h2>` +
          popupText +
          `</div><div class="table-div-pop-up"><div class="table-name-div"><p>Videos</p></div><div class="table-boddy-div"><p>15 sec Video</p><p>$99</p></div><div class="table-boddy-div"><p>30 sec Video</p><p>$139</p></div><div class="table-boddy-div"><p>60 sec Video</p><p>$169</p></div></div><div class="table-div-pop-up"><div class="table-name-div"><p>Videos with editing services</p></div><div class="table-boddy-div"><p>15 sec Video with editing services</p><p>$164</p></div><div class="table-boddy-div"><p>30 sec Video with editing services</p><p>$204</p></div><div class="table-boddy-div"><p>60 sec Video with editing services</p><p>$234</p></div></div></div></div>`,
      )
      $('.aditional-info-pr-p.popup-call a')
        .off('click.callPricingPopup')
        .on('click.callPricingPopup', function () {
          $('.pricing-popup-wrapper').show()
          return false
        })
      $('.pricing-popup-wrapper')
        .off('click')
        .on('click', function (e) {
          if (e.target !== e.currentTarget) {
            return false
          }
          $(this).hide()
        })
      $('.pricing-popup-wrapper .pop-up-pricing .close-x')
        .off('click')
        .on('click', function () {
          $('.pricing-popup-wrapper').hide()
        })
    }
    if (
      $(
        '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero',
      ).length > 0
    ) {
      if (
        $(
          '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero .gallery-item',
        ).length == 3
      ) {
        $(
          '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero .gallery-item',
        ).each(function () {
          $(this)
            .clone()
            .appendTo(
              $(
                '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero',
              ),
            )
        })
      }
      $(
        '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero',
      ).on('init', function (event, slick) {
        if (
          $(
            '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero .video .case-slider-lazyload',
          ).length > 0
        ) {
          let mainImgSrc = $(
            '.case-studies-video-gallery-hero .gallery-item.slick-current .case-slider-lazyload',
          ).data('orig-src')
          $(
            '.case-studies-video-gallery-hero .gallery-item.slick-current .case-slider-lazyload',
          ).attr('src', mainImgSrc)
          $(window)
            .off(
              'load.caseHeroStudiesVideoLazyLoad resize.caseHeroStudiesVideoLazyLoad scroll.caseHeroStudiesVideoLazyLoad',
            )
            .on(
              'load.caseHeroStudiesVideoLazyLoad resize.caseHeroStudiesVideoLazyLoad scroll.caseHeroStudiesVideoLazyLoad',
              function (e) {
                if (
                  $(
                    '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero',
                  ).isInViewport()
                ) {
                  if (
                    $(
                      '.case-studies-video-gallery-hero .gallery-item.slick-current',
                    ).length > 0
                  ) {
                    if (
                      $(
                        '.case-studies-video-gallery-hero .gallery-item.slick-current .case-slider-lazyload',
                      ).length > 0
                    ) {
                      let videoUrl = $(
                        '.case-studies-video-gallery-hero .gallery-item.slick-current .case-slider-lazyload',
                      ).data('video-url')
                      let poster = $(
                        '.case-studies-video-gallery-hero .gallery-item.slick-current .case-slider-lazyload',
                      ).data('poster-url')
                      $(window).off(
                        'load.caseHeroStudiesVideoLazyLoad resize.caseHeroStudiesVideoLazyLoad scroll.caseHeroStudiesVideoLazyLoad',
                      )
                      setTimeout(function () {
                        $(
                          '.case-studies-video-gallery-hero .gallery-item.slick-current .case-slider-lazyload',
                        ).remove()
                        $(
                          '.case-studies-video-gallery-hero .gallery-item.slick-current .video',
                        ).append(
                          `<video class="lazy-video"playsinline="true"width="100%"style="object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
                            poster +
                            `"><source src="` +
                            videoUrl +
                            `"type="video/mp4"></video>`,
                        )
                        $(
                          '.case-studies-video-gallery-hero .gallery-item.slick-current',
                        )
                          .addClass('video')
                          .removeClass('image')
                      }, 200)
                    }
                  }
                }
              },
            )
        }
      })
      $(
        '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero',
      )
        .not('.slick-initialized')
        .slick({
          slidesToShow: 1,
          infinite: true,
          slidesToScroll: 1,
          autoplay: false,
          arrows: true,
          dots: true,
          appendDots: $('.gallery-navigation-hero .dots'),
          prevArrow: $('.gallery-navigation-hero .slick-left'),
          nextArrow: $('.gallery-navigation-hero .slick-right'),
          centerMode: true,
          centerPadding: '0px',
          variableWidth: false,
          useCSS: false,
          responsive: [
            { breakpoint: 1000, settings: { slidesToShow: 1 } },
            { breakpoint: 801, settings: { slidesToShow: 1 } },
          ],
        })
      $('.case-studies-video-gallery-hero .gallery-item')
        .not('.slick-current')
        .find('video')
        .each(function () {
          $(this).get(0).pause()
        })
      $('.case-studies-video-gallery-wrapper-hero .gallery-item')
        .off('click')
        .on('click', function () {
          if (!$(this).hasClass('slick-current')) {
            let slider = $(
              '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero',
            )
            let changeSlide = parseInt($(this).data('slick-index'))
            slider.slick('slickGoTo', changeSlide)
            return false
          }
          let video = $(this).find('video')
          if (video.prop('muted')) {
            $('.gallery-item video').prop('muted', true)
            $(this).addClass('with-sound')
            video.prop('muted', false)
            $('.case-studies-video-gallery-wrapper-hero').addClass('all-sound')
          } else {
            $('.gallery-item video').prop('muted', true)
            $(this).removeClass('with-sound')
            video.prop('muted', true)
            $('.case-studies-video-gallery-wrapper-hero').removeClass(
              'all-sound',
            )
          }
        })
      $(
        '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero',
      ).on('afterChange', function () {
        $('.case-studies-video-gallery-hero .gallery-item')
          .not('.slick-current')
          .find('video')
          .each(function () {
            $(this).get(0).pause()
            $(this).get(0).currentTime = 0
          })
        $('.case-studies-video-gallery-hero .slick-current')
          .find('video')
          .get(0)
          .play()
        if (
          $('.case-studies-video-gallery-wrapper-hero').hasClass('all-sound')
        ) {
          $('.case-studies-video-gallery-hero .slick-current')
            .find('video')
            .prop('muted', false)
          $('.case-studies-video-gallery-hero .slick-current').addClass(
            'with-sound',
          )
        }
      })
      $(
        '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero',
      ).on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        $('.case-studies-video-gallery-wrapper-hero .gallery-item')
          .off('click')
          .on('click', function () {
            if (!$(this).hasClass('slick-current')) {
              let slider = $(
                '.case-studies-video-gallery-wrapper-hero .case-studies-video-gallery-hero',
              )
              let changeSlide = parseInt($(this).data('slick-index'))
              slider.slick('slickGoTo', changeSlide)
              return false
            }
            let video = $(this).find('video')
            if (video.prop('muted')) {
              $('.gallery-item video').prop('muted', true)
              $(this).addClass('with-sound')
              video.prop('muted', false)
              $('.case-studies-video-gallery-wrapper-hero').addClass(
                'all-sound',
              )
            } else {
              $('.gallery-item video').prop('muted', true)
              $(this).removeClass('with-sound')
              video.prop('muted', true)
              $('.case-studies-video-gallery-wrapper-hero').removeClass(
                'all-sound',
              )
            }
          })
        let nextSlideDom = $(slick.$slides.get(nextSlide))
        let currentSlideDom = $(slick.$slides.get(currentSlide))
        if (nextSlideDom.find('video').length < 1) {
          nextSlideDom.find('.case-slider-lazyload').hide()
          let videoUrl = nextSlideDom
            .find('.case-slider-lazyload')
            .data('video-url')
          let posterUrl = nextSlideDom
            .find('.case-slider-lazyload')
            .data('poster-url')
          nextSlideDom.find('.case-slider-lazyload').remove()
          nextSlideDom
            .find('.video')
            .append(
              `<video class="lazy-video"playsinline="true"width="100%"style="object-fit: cover;"autoplay="false"muted="true"loop="true"preload="auto"poster="` +
                posterUrl +
                `"><source src="` +
                videoUrl +
                `"type="video/mp4"></video>`,
            )
          nextSlideDom.removeClass('image').addClass('video')
        }
        currentSlideDom.find('video').prop('muted', true)
        currentSlideDom.removeClass('with-sound')
      })
    }
  })
})(jQuery);

(function ($) {
  $(document).ready(function () {
    if (
      window.location.href.indexOf('/summary-pricing-1/') > -1 ||
      window.location.href.indexOf('/summary-pricing/') > -1
    ) {
      localStorage.removeItem('quiz_version')
    }

    if (
      window.location.href.indexOf('/summary-pricing-1/') > -1 &&
      window.location.href.indexOf('&version=2') > -1
    ) {
      localStorage.setItem('quiz_version', 2)
    }

    if (window.location.href.indexOf('quiz/summary/') > -1) {
      if (localStorage.getItem('quiz_version') == 2) {
        $('a.shortcode-button').each(function () {
          let href = $(this).attr('href')
          if (href.indexOf('/summary-pricing/') > -1) {
            let override =
              href.replace('summary-pricing', 'summary-pricing-1') +
              '&version=2'
            $(this).attr('href', override)
          }
        })
      }
    }

    if ($('.full_button.agency-reroute').length > 0) {
      $('.full_button.agency-reroute').on('click', function (e) {
        e.preventDefault()
        if ($('input[data-value="Agency"]').is(':checked')) {
          window.location.href = '/quiz/step-3-1/'
          return false
        } else {
          window.location.href = '/quiz/step-3/'
        }
      })
    }

    if ($('.steamline-slider').length > 0) {
      $('.steamline-slider').not('.slick-initialized').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        variableWidth: false,
        prevArrow:
          '<button class="slide-arrow prev-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M7.86751 18.9995L1.74854 11.9995L7.86751 4.99951L8.78536 6.04951L4.23983 11.2495H19.2313V12.7495H4.23983L8.78536 17.9495L7.86751 18.9995Z" fill="black"/></svg></button>',
        nextArrow:
          '<button class="slide-arrow next-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none"><path d="M13.1325 4.99951L19.2515 11.9995L13.1325 18.9995L12.2146 17.9495L16.7602 12.7495L1.76868 12.7495L1.76868 11.2495L16.7602 11.2495L12.2146 6.04951L13.1325 4.99951Z" fill="black"/></svg></button>',
        dots: false,
        infinite: true,
        centerMode: false,
        swipeToSlide: false,
      })
    }

    if ($('.agency-calculator-wrapper').length > 0) {
      function closestStep(targetNumber) {
        let numbers = [0, 1000, 2000, 3000, 4000, 5000]
        var closestNumber = null
        var minDifference = null

        $.each(numbers, function (index, number) {
          var difference = Math.abs(number - targetNumber)

          if (minDifference === null || difference < minDifference) {
            minDifference = difference
            closestNumber = number
          }
        })

        return closestNumber
      }

      function addCommas(nStr) {
        nStr += ''
        x = nStr.split('.')
        x1 = x[0]
        x2 = x.length > 1 ? '.' + x[1] : ''
        var rgx = /(\d+)(\d{3})/
        while (rgx.test(x1)) {
          x1 = x1.replace(rgx, '$1' + ',' + '$2')
        }
        return x1 + x2
      }

      const minPrice = 1000
      const maxPrice = 5000

      let defaultPricing = parseInt($('.agency-price-slider').data('default'))

      if ($('.baseless-calculator').length < 1) {
        $('.agency-price-slider .price-slider').slider({
          value: defaultPricing,
          max: 5000,
          step: 0.0001,
          slide: function (event, ui) {
            let amount = $(
              '.agency-price-slider .price-slider .ui-slider-handle',
            ).position().left
            $('.agency-price-slider .price-slider .price-trail').css({
              width: amount + 3 + 'px',
            })
          },
          change: function (event, ui) {
            let currentValue = $('.agency-price-slider .price-slider').slider(
              'value',
            )

            if (currentValue == 5000) {
              $('.agency-price-slider .ui-slider-handle').css({
                transform: 'translate(-100%, -50%)',
              })
            } else {
              $('.agency-price-slider .ui-slider-handle').css({
                transform: 'translateY(-50%)',
              })
            }

            let amount = $(
              '.agency-price-slider .price-slider .ui-slider-handle',
            ).position().left
            $('.agency-price-slider .price-slider .price-trail').css({
              width: amount + 3 + 'px',
            })
          },
          stop: function (event, ui) {
            $('.agency-price-slider .price-slider').slider(
              'value',
              closestStep(ui.value),
            )
            let currentValue = $('.agency-price-slider .price-slider').slider(
              'value',
            )

            if (currentValue == 5000) {
              $('.agency-price-slider .ui-slider-handle').css({
                transform: 'translate(-100%, -50%)',
              })
            } else {
              $('.agency-price-slider .ui-slider-handle').css({
                transform: 'translateY(-50%)',
              })
            }

            let pack = $(
              '.price-ranges .range[data-value="' + currentValue + '"]',
            ).data('pack')
            let type = $('.calculator-selectors #type').val()
            let duration = $('.calculator-selectors #duration').val()

            calculateResults(pack, type, duration)
          },
        })
      } else {
        if ($('.agency-price-slider .price-slider').length > 0) {
          $('.agency-price-slider .price-slider').slider({
            value: defaultPricing,
            max: 5000,
            step: 0.0001,
            slide: function (event, ui) {
              let amount = $(
                '.agency-price-slider .price-slider .ui-slider-handle',
              ).position().left
              $('.agency-price-slider .price-slider .price-trail').css({
                width: amount + 3 + 'px',
              })
            },
            change: function (event, ui) {
              let currentValue = $('.agency-price-slider .price-slider').slider(
                'value',
              )

              if (currentValue == 5000) {
                $('.agency-price-slider .ui-slider-handle').css({
                  transform: 'translate(-100%, -50%)',
                })
              } else {
                $('.agency-price-slider .ui-slider-handle').css({
                  transform: 'translate(-25%, -50%)',
                })
              }

              let amount = $(
                '.agency-price-slider .price-slider .ui-slider-handle',
              ).position().left
              $('.agency-price-slider .price-slider .price-trail').css({
                width: amount + 3 + 'px',
              })
            },
            stop: function (event, ui) {
              $('.agency-price-slider .price-slider').slider(
                'value',
                closestStep(ui.value),
              )
              let currentValue = $('.agency-price-slider .price-slider').slider(
                'value',
              )

              if (currentValue == 5000) {
                $('.agency-price-slider .ui-slider-handle').css({
                  transform: 'translate(-100%, -50%)',
                })
              } else {
                $('.agency-price-slider .ui-slider-handle').css({
                  transform: 'translate(-25%, -50%)',
                })
              }

              let pack = $(
                '.price-ranges .range[data-value="' + currentValue + '"]',
              ).data('pack')
              $('.calculator-results-wrapper .calculator-results').fadeOut(
                250,
                function () {
                  calculateBaselessResults(pack)
                },
              )
            },
          })
        }
      }

      $('.agency-price-slider:not(.baseless) .price-ranges .range')
        .off('click')
        .on('click', function () {
          $('.agency-price-slider .price-slider').slider(
            'value',
            $(this).data('value'),
          )
          let pack = $(this).data('pack')
          let type = $('.calculator-selectors #type').val()
          let duration = $('.calculator-selectors #duration').val()

          calculateResults(pack, type, duration)
        })

      $('.agency-price-slider.baseless .price-ranges .range')
        .off('click')
        .on('click', function () {
          $('.agency-price-slider .price-slider').slider(
            'value',
            $(this).data('value'),
          )
          let pack = $(this).data('pack')
          $('.calculator-results-wrapper .calculator-results').fadeOut(
            250,
            function () {
              calculateBaselessResults(pack)
            },
          )
        })

      $('.calculator-selectors #type')
        .off('change')
        .on('change', function () {
          let duration = $('.calculator-selectors #duration').val()
          let currentValue = $('.agency-price-slider .price-slider').slider(
            'value',
          )
          let pack = $(
            '.price-ranges .range[data-value="' + currentValue + '"]',
          ).data('pack')
          let type = $(this).val()

          calculateResults(pack, type, duration)
        })

      $('.calculator-selectors #duration')
        .off('change')
        .on('change', function () {
          let duration = $(this).val()
          let currentValue = $('.agency-price-slider .price-slider').slider(
            'value',
          )
          let pack = $(
            '.price-ranges .range[data-value="' + currentValue + '"]',
          ).data('pack')
          let type = $('.calculator-selectors #type').val()

          calculateResults(pack, type, duration, 'duration')
        })

      $('.klaviyo-popup-button')
        .off('click')
        .on('click', function (e) {
          e.preventDefault()
          $('body').addClass('no-scroll')
          window._klOnsite = window._klOnsite || []
          window._klOnsite.push(['openForm', 'RHb42t'])

          setTimeout(function () {
            $('.needsclick.kl-private-reset-css-Xuajs1')
              .first()
              .on('click', function (e) {
                if (e.target !== e.currentTarget) return
                $('body').removeClass('no-scroll')
              })

            $('.klaviyo-close-form').on('click', function () {
              $('body').removeClass('no-scroll')
            })
          }, 800)
        })

      $('.calculator-results .pack-content .up-to-section .details')
        .off('click')
        .on('click', function () {
          $('.pack-details-popup').show()
        })

      $('.pack-details-popup')
        .off('click')
        .on('click', function (e) {
          if (e.target !== e.currentTarget) return
          $('.pack-details-popup').hide()
        })

      $(
        '.pack-details-popup .details-overlay .details-content-wrapper .close-details',
      )
        .off('click')
        .on('click', function (e) {
          $('.pack-details-popup').hide()
        })

      let duration = $('.calculator-selectors #duration').val()
      let currentValue = $('.agency-price-slider .price-slider').slider('value')
      let pack = $(
        '.price-ranges .range[data-value="' + currentValue + '"]',
      ).data('pack')
      let type = $('.calculator-selectors #type').val()

      setTimeout(function () {
        let $slider = $('.agency-price-slider .price-slider')
        $slider.slider('option', 'change').call($slider)

        if ($('.baseless-calculator').length < 1) {
          calculateResults(pack, type, duration)
        } else {
          $('.calculator-results-wrapper .calculator-results').fadeOut(
            250,
            function () {
              calculateBaselessResults(pack)
            },
          )
        }
      }, 10)

      function calculateResults(pack, type, duration, target) {
        if (!target) {
          if (type == 'Honest reviews') {
            $('.calculator-selectors #duration').val('30')
            $('.video-duration-selector #duration option[value="15"]').hide()
            duration = '30'
          } else {
            $('.video-duration-selector #duration option[value="15"]').show()
          }
        }

        let pricePerVideo = packsData(pack, 'prices', type, duration)
        let credits = packsData(pack, 'credits')
        let prodFullPrice = packsData('type-prices', '', type, duration)
        let upToVideos = Math.floor(credits / prodFullPrice)
        let moneySavings = addCommas((300 - pricePerVideo) * upToVideos)
        let hoursSaved = Math.round((175 * upToVideos) / 60)
        let features = packsData(pack, 'features')

        /** bottom blocks **/
        $('.price-per-video-card .video-price .amount').text(
          '$' + pricePerVideo,
        )
        $('.money-savings-card .money-savings .amount').text('$' + moneySavings)
        $('.time-savings-card .time-savings .amount').text(
          hoursSaved + ' hours',
        )

        /** right block **/
        $(
          '.calculator-results .pack-content .features-wrapper .features',
        ).empty()
        $('.calculator-results .pack-type-wrapper .pack-type .text').text(pack)
        $(
          '.calculator-results .pack-type-wrapper .pack-description .text',
        ).text(packsData(pack, 'description'))
        $(
          '.calculator-results .pack-content .up-to-section .result-numbers .numbers',
        ).text(upToVideos)

        $.each(features, function (index, feature) {
          $(
            '.calculator-results .pack-content .features-wrapper .features',
          ).append('<li>' + feature + '</li>')
        })

        $(
          '.calculator-results .pack-content .pricing-wrapper .pricing .price',
        ).text(packsData(pack, 'full_price'))
        if (packsData(pack, 'extra_credits').length > 0) {
          $(
            '.calculator-results .pack-content .pricing-wrapper .pricing .credit-bonus',
          ).text(packsData(pack, 'extra_credits'))
          $(
            '.calculator-results .pack-content .pricing-wrapper .pricing .credit-bonus',
          ).show()
        } else {
          $(
            '.calculator-results .pack-content .pricing-wrapper .pricing .credit-bonus',
          ).hide()
        }

        $(
          '.calculator-results .pack-content .pricing-wrapper .total-credits .credits',
        ).text(
          'Total received credits: ' + addCommas(packsData(pack, 'credits')),
        )
        $(
          '.calculator-results .pack-content .order-wrapper .order-button a',
        ).attr('href', packsData(pack, 'order_url'))
      }

      function calculateBaselessResults(pack) {
        let price = packsData(pack, 'full_price')
        let cashSavings = packsData(pack, 'cash_savings')
        let videos = packsData(pack, 'videos')
        let pricePerVideo = packsData(pack, 'price_per_video')
        let discountLeft = packsData(pack, 'discount_left')
        let discountRight = packsData(pack, 'discount_right')
        let totalCredits = packsData(pack, 'total_credits')
        let moreCredits = packsData(pack, 'more_credits')
        let description = packsData(pack, 'description')
        let features = packsData(pack, 'features')
        let orderUrl = packsData(pack, 'order_url')

        /** bottom blocks **/
        $('.money-savings-card .money-savings .amount').text(cashSavings)
        $('.pack-videos-card .pack-videos .amount').text(videos)
        $('.price-per-video-card .video-price .amount').text(pricePerVideo)

        $(
          '.price-per-video-card .video-price .additional-amount, .total-credits-card .total-credits .additional-amount',
        ).empty()
        $(
          '.price-per-video-card .video-price .additional-amount, .total-credits-card .total-credits .additional-amount',
        ).hide()

        if (discountLeft !== '') {
          $('.price-per-video-card .video-price .additional-amount').html(
            '<span class="left-discount">' +
              discountLeft +
              '</span> | <span class="right-discount">' +
              discountRight +
              '</span>',
          )
          $('.price-per-video-card .video-price .additional-amount').show()
        }

        $('.total-credits-card .total-credits .amount').text(totalCredits)

        if (moreCredits !== '') {
          $('.total-credits-card .total-credits .additional-amount').text(
            moreCredits,
          )
          $('.total-credits-card .total-credits .additional-amount').show()
        }

        /** right block **/
        $(
          '.calculator-results .pack-content .features-wrapper .features',
        ).empty()
        $(
          '.mobile-pack-results-wrapper .mobile-pack-content .features-wrapper .features',
        ).empty()
        $('.calculator-results .pack-type-wrapper .pack-type .text').text(pack)
        $(
          '.calculator-results .pack-type-wrapper .pack-description .text',
        ).text(description)
        $(
          '.calculator-results .pack-content .up-to-section .result-numbers .numbers',
        ).text(videos)

        if (features.length > 0) {
          $.each(features, function (index, feature) {
            $(
              '.calculator-results .pack-content .features-wrapper .features',
            ).append('<li>' + feature + '</li>')
            $(
              '.mobile-pack-results-wrapper .mobile-pack-content .features-wrapper .features',
            ).append('<li>' + feature + '</li>')
          })
        }

        $(
          '.calculator-results .pack-content .pricing-wrapper .pricing .credit-bonus',
        ).empty()
        $(
          '.calculator-results .pack-content .pricing-wrapper .pricing .credit-bonus',
        ).hide()
        /*
                if(moreCredits !== '') {
                   $('.calculator-results .pack-content .pricing-wrapper .pricing .credit-bonus').text(moreCredits);
                   $('.calculator-results .pack-content .pricing-wrapper .pricing .credit-bonus').show();
                }
                */

        $(
          '.calculator-results .pack-content .pricing-wrapper .pricing .price',
        ).text(price)
        $(
          '.calculator-results .pack-content .pricing-wrapper .total-credits .credits',
        ).text('Added to balance: $' + totalCredits)
        $(
          '.calculator-results .pack-content .order-wrapper .order-button a',
        ).attr('href', orderUrl)
        $(
          '.mobile-pack-results-wrapper .mobile-pack-content .order-wrapper .order-button a',
        ).attr('href', orderUrl)

        $('.calculator-results-wrapper .calculator-results').fadeIn(500)
      }

      function packsData(pack, data, type, duration) {
        const packsData = packsDataArray

        if ($('.baseless-calculator').length > 0) {
          return packsData[pack][data]
        }

        if (pack == 'type-prices') {
          return packsData['type-prices'][type][duration]
        } else if (type && duration) {
          return packsData[pack][data][type][duration]
        } else {
          return packsData[pack][data]
        }
      }
    }
  })
})(jQuery);

(function ($) {
  $(document).ready(function () {
    if ($('.ajax-inspirations-row.rework').length > 0) {
      let minHeight = $('.ajax-inspirations-row.rework').outerHeight(true)

      $('.ajax-inspirations-row.rework').css({
        'min-height': minHeight + 'px',
      })

      $(window)
        .off('resize.minInspirationHeight')
        .on('resize.minInspirationHeight', function () {
          let minHeight = $('.ajax-inspirations-row.rework').outerHeight(true)

          $('.ajax-inspirations-row.rework').css({
            'min-height': minHeight + 'px',
          })
        })

      if (
        $(
          '.ajax-inspirations .creator-content .creator-video .lazy-inspiration-img',
        ).length > 0
      ) {
        /** Image loading**/
        let imageLoadLength = 0
        let imageLength = $(
          '.creator-content .creator-video img, .creator-content .creator-bottom img.creator-avatar, .blurred-content img.blurred-image',
        ).length

        // $(
        //   '.creator-content .creator-video img, .creator-content .creator-bottom img.creator-avatar, .blurred-content img.blurred-image',
        // ).hide()

        $(
          '.creator-content .creator-video img, .creator-content .creator-bottom img.creator-avatar, .blurred-content img.blurred-image',
        ).each(function () {
          if (this.complete) {
            imageLoadLength++

            if (imageLoadLength == imageLength) {
              setTimeout(function () {
                $(
                  '.creator-content .creator-video img, .creator-content .creator-bottom img.creator-avatar, .blurred-content img.blurred-image',
                ).show()

                $('#find-perfect').removeClass('loading-animation')
              }, 500)
            }
          } else {
            $(this).on('load', function () {
              imageLoadLength++

              if (imageLoadLength == imageLength) {
                setTimeout(function () {
                  $(
                    '.creator-content .creator-video img, .creator-content .creator-bottom img.creator-avatar, .blurred-content img.blurred-image',
                  ).show()

                  $('#find-perfect').removeClass('loading-animation')
                }, 500)
              }
            })
          }
        })
        /** Image loading end **/
      }

      if (typeof inspirationData !== 'undefined') {
        $('.inspirations-filter-row .inspirations-filter .filter')
          .off('click.inspirationFilter')
          .on('click.inspirationFilter', function () {
            if ($(this).hasClass('active')) {
              return false
            }

            $('#find-perfect').addClass('loading-animation')

            let filterId = $(this).data('id')
            $(
              '.inspirations-filter-row .inspirations-filter .filter',
            ).removeClass('active')
            $(this).addClass('active')
            $('.ajax-inspirations-row.rework .ajax-inspirations').empty()
            $('.ajax-inspirations-row.rework .ajax-inspirations').append(
              inspirationData[filterId].creators +
                inspirationData[filterId].blur,
            )

            /** Image loading**/

            let imageLoadLength = 0
            let imageLength = $(
              '.creator-content .creator-video img, .creator-content .creator-bottom img.creator-avatar, .blurred-content img.blurred-image',
            ).length

            $(
              '.creator-content .creator-video img, .creator-content .creator-bottom img.creator-avatar, .blurred-content img.blurred-image',
            ).hide()

            $(
              '.creator-content .creator-video img, .creator-content .creator-bottom img.creator-avatar, .blurred-content img.blurred-image',
            ).each(function () {
              $(this).get(0).onload = function () {
                imageLoadLength++

                if (imageLoadLength == imageLength) {
                  $(
                    '.creator-content .creator-video img, .creator-content .creator-bottom img.creator-avatar, .blurred-content img.blurred-image',
                  ).show()

                  $('#find-perfect').removeClass('loading-animation')
                }
              }
            })

            /** Image loading end **/

            $(
              '.ajax-inspirations .creator-content .creator-video video.lazy-video.active',
            ).each(function () {
              $(this).removeClass('active')
              $(this).parent().removeClass('playing')
              $(this).get(0).pause()
            })

            $(
              '.ajax-inspirations .creator-content .creator-video .video-sound-block',
            )
              .off('click.toggleInspirationSound')
              .on('click.toggleInspirationSound', function () {
                let video = $(this).parent().find('video.lazy-video')
                if ($(this).parent().hasClass('with-sound')) {
                  video.prop('muted', true)
                } else {
                  video.prop('muted', false)
                }
                $(this).parent().toggleClass('with-sound')
              })

            $('.ajax-inspirations .creator-content .creator-video')
              .off('click.lazyLoadInspiration')
              .on('click.lazyLoadInspiration', function (e) {
                if ($(e.target).hasClass('video-sound-block')) {
                  return false
                }

                if ($(this).find('img.lazy-inspiration-img').length > 0) {
                  $(
                    '.ajax-inspirations .creator-content .creator-video video.lazy-video.active',
                  ).each(function () {
                    $(this).removeClass('active')
                    $(this).parent().removeClass('playing')
                    $(this).get(0).pause()
                  })

                  let _this = $(this)
                  let image = $(this).find('img.lazy-inspiration-img')
                  let videoUrl = image.data('video-url')
                  let poster = image.data('poster-url')
                  $(this).addClass('loaded')
                  $(this).addClass('playing')
                  $(this).append(
                    `
                                <video class="lazy-video active" playsinline="true" width="100%" style="display: none; object-fit: cover;" autoplay="false" muted="true" loop="true" preload="auto" poster="` +
                      poster +
                      `">
                                    <source src="` +
                      videoUrl +
                      `">
                                </video>
                            `,
                  )
                  _this.find('video.lazy-video')[0].onloadeddata = function () {
                    $(this)[0].play()
                    $(this).show()
                    $(this).prop('muted', false)
                    image.remove()
                  }
                } else {
                  let video = $(this).find('.lazy-video')

                  if ($(this).find('video.lazy-video.active').length > 0) {
                    video.removeClass('active')
                    $(this).removeClass('playing')
                    video.get(0).pause()
                  } else {
                    if (
                      $(
                        '.ajax-inspirations .creator-content .creator-video video.lazy-video.active',
                      ).length > 0
                    ) {
                      $(
                        '.ajax-inspirations .creator-content .creator-video video.lazy-video.active',
                      )
                        .get(0)
                        .pause()
                      $(
                        '.ajax-inspirations .creator-content .creator-video video.lazy-video.active',
                      ).removeClass('active')
                      $(
                        '.ajax-inspirations .creator-content .creator-video',
                      ).removeClass('playing')
                    }

                    video.addClass('active')
                    $(this).addClass('playing')
                    video.get(0).play()
                  }
                }
              })

            setTimeout(scrollToDynamicTarget($('.inspirations-container')), 100)
          })
      }
    }

    function scrollToDynamicTarget(scrollDiv) {
      let scrollOffset = 50

      if ($(window).width() < 801) {
        scrollOffset = 20
      }
      let targetOffset =
        $(scrollDiv).offset().top -
        ($('#header_billo').outerHeight(true) + scrollOffset)
      $('html, body').animate(
        {
          scrollTop: targetOffset,
        },
        1000,
        function () {
          let newTargetOffset =
            $(scrollDiv).offset().top -
            ($('#header_billo').outerHeight(true) + scrollOffset)
          if ($(window).scrollTop() !== newTargetOffset) {
            $('html, body').animate(
              {
                scrollTop: newTargetOffset,
              },
              350,
            )
          }
        },
      )
    }

    if ($('.ajax-inspirations').length > 0) {
      $(window)
        .off('scroll.blurCardScroll')
        .on('scroll.blurCardScroll', function () {
          let windowBot = $(window).height() + $(window).scrollTop()
          if ($('.blurred-cars-wrapper').length > 0) {
            let blurPosition = $('.blurred-cars-wrapper').offset().top

            if (windowBot > blurPosition) {
              let blurHeight = $('.blurred-cars-wrapper').height()
              let blurBreak = blurPosition + blurHeight
              let visibleHeight = Math.min(windowBot, blurBreak) - blurPosition
              let visibilityPercentage = (visibleHeight / blurHeight) * 100
              let blurOp = visibilityPercentage / 100

              $('.blurred-wrapper-overlay').css({
                opacity: blurOp,
              })
            }
          }
        })
    }

    if ($('.background-accordion .arrow-left-accord').length > 0) {
      $('.background-accordion .arrow-left-accord')
        .off('click.accordionLeftClick')
        .on('click.accordionLeftClick', function () {
          if ($('.tabs-buttons .button-tab.active').prev().length > 0) {
            $('.tabs-buttons .button-tab.active').prev().click()
          } else {
            $('.tabs-buttons .button-tab').last().click()
          }
        })
    }

    if ($('.background-accordion .arrow-right-accord').length > 0) {
      $('.background-accordion .arrow-right-accord')
        .off('click.accordionRightClick')
        .on('click.accordionRightClick', function () {
          if ($('.tabs-buttons .button-tab.active').next().length > 0) {
            $('.tabs-buttons .button-tab.active').next().click()
          } else {
            $('.tabs-buttons .button-tab').first().click()
          }
        })
    }

    if ($('.inspirations-container .inspirations-row').length > 0) {
      let inspirationFilters = $('.filter')

      // Define a mapping between data-id values and image URLs
      var imageMap = {
        health_and_wellness:
          'https://billo.app/wp-content/uploads/2024/07/Vector.svg',
        apparel_and_fashion:
          'https://billo.app/wp-content/uploads/2024/07/apparel.svg',
        apps_and_digital_services:
          'https://billo.app/wp-content/uploads/2024/07/phone_iphone.svg',
        automotive_and_marine:
          'https://billo.app/wp-content/uploads/2024/07/Delivery-24.svg',
        children_and_family:
          'https://billo.app/wp-content/uploads/2024/07/child.svg',
        technology_and_gadgets:
          'https://billo.app/wp-content/uploads/2024/07/category.svg',
        cosmetics_and_Beauty:
          'https://billo.app/wp-content/uploads/2024/07/health_and_beauty.svg',
        food_and_beverage:
          'https://billo.app/wp-content/uploads/2024/07/lunch_dining.svg',
        home_and_lifestyle:
          'https://billo.app/wp-content/uploads/2024/07/house.svg',
        pets: 'https://billo.app/wp-content/uploads/2024/07/pets.svg',
      }

      inspirationFilters.each(function (index, filter) {
        var dataId = $(filter).data('id')
        var imgSrc = imageMap[dataId]

        if (imgSrc) {
          var img = document.createElement('img')
          img.src = imgSrc
          img.alt = dataId.replace(/_/g, ' ')
          img.style.marginRight = '10px'
          var span = filter.querySelector('span')
          if (span) {
            span.insertBefore(img, span.firstChild)
          }
        }
      })

      let activeFilterID = $(
        '.inspirations-filter-row .inspirations-filter .filter.active',
      ).data('id')
      let activeFilterHtml = $(
        '.inspirations-filter-row .inspirations-filter .filter.active span',
      ).html()
      $('.inspirations-filter-row .selected-category .filter.active').attr(
        'data-id',
        activeFilterID,
      )
      $(
        '.inspirations-filter-row .selected-category .filter.active .active-filter-data',
      ).html(activeFilterHtml)

      $('.selected-category')
        .off('click.mobileToggleFilter')
        .on('click.mobileToggleFilter', function () {
          if ($(window).width() < 801) {
            $('.inspirations-filter').slideToggle()
            $('.selected-category img.arrow').toggleClass('rotate')
          }
        })

      $('.inspirations-filter .filter')
        .off('click.mobileSelectFilter')
        .on('click.mobileSelectFilter', function () {
          let filterID = $(this).data('id')
          let filterHtml = $(this).find('.inspiration-single-filter').html()

          $('.inspirations-filter-row .selected-category .filter.active').attr(
            'data-id',
            filterID,
          )
          $(
            '.inspirations-filter-row .selected-category .filter.active .active-filter-data',
          ).html(filterHtml)

          if ($(window).width() < 801) {
            $('.inspirations-filter').slideToggle()
            $('.selected-category img.arrow').toggleClass('rotate')
          }
        })

      if (
        $(
          '.ajax-inspirations .creator-content .creator-video .lazy-inspiration-img',
        ).length > 0
      ) {
        $(
          '.ajax-inspirations .creator-content .creator-video .video-sound-block',
        )
          .off('click.toggleInspirationSound')
          .on('click.toggleInspirationSound', function () {
            let video = $(this).parent().find('video.lazy-video')
            if ($(this).parent().hasClass('with-sound')) {
              video.prop('muted', true)
            } else {
              video.prop('muted', false)
            }
            $(this).parent().toggleClass('with-sound')
          })

        $('.ajax-inspirations .creator-content .creator-video')
          .off('click.lazyLoadInspiration')
          .on('click.lazyLoadInspiration', function (e) {
            if ($(e.target).hasClass('video-sound-block')) {
              return false
            }

            if ($(this).find('img.lazy-inspiration-img').length > 0) {
              $(
                '.ajax-inspirations .creator-content .creator-video video.lazy-video.active',
              ).each(function () {
                $(this).removeClass('active')
                $(this).parent().removeClass('playing')
                $(this).get(0).pause()
              })

              let image = $(this).find('img.lazy-inspiration-img')
              let videoUrl = image.data('video-url')
              let poster = image.data('poster-url')
              $(this).addClass('loaded')
              $(this).addClass('playing')
              $(this).append(
                `
                            <video class="lazy-video active" playsinline="true" width="100%" style="display: none; object-fit: cover;" autoplay="false" muted="true" loop="true" preload="auto" poster="` +
                  poster +
                  `">
                    		    <source src="` +
                  videoUrl +
                  `">
                    		</video>
                        `,
              )

              $(this).find('video.lazy-video')[0].onloadeddata = function () {
                $(this)[0].play()
                $(this).show()
                $(this).prop('muted', false)
                image.remove()
              }
            } else {
              let video = $(this).find('.lazy-video')

              if ($(this).find('video.lazy-video.active').length > 0) {
                video.removeClass('active')
                $(this).removeClass('playing')
                video.get(0).pause()
              } else {
                if (
                  $(
                    '.ajax-inspirations .creator-content .creator-video video.lazy-video.active',
                  ).length > 0
                ) {
                  $(
                    '.ajax-inspirations .creator-content .creator-video video.lazy-video.active',
                  )
                    .get(0)
                    .pause()
                  $(
                    '.ajax-inspirations .creator-content .creator-video video.lazy-video.active',
                  ).removeClass('active')
                  $(
                    '.ajax-inspirations .creator-content .creator-video',
                  ).removeClass('playing')
                }

                video.addClass('active')
                $(this).addClass('playing')
                video.get(0).play()
              }
            }
          })
      }
    }

    if ($('.inspirations-filter-row .inspirations-filter').length > 0) {
      let sideWidth = $('.inspirations-filter-row').width()
      let sidePos = $('.inspirations-filter-row').offset().left
      inspirations_fixed_sidebar(sideWidth, sidePos)

      $(window)
        .off('scroll.stickyInspirationFilter')
        .on('scroll.stickyInspirationFilter', function () {
          inspirations_fixed_sidebar(sideWidth, sidePos)
        })

      $(window)
        .off('resize.stickyInspirationFilterRecalc')
        .on('resize.stickyInspirationFilterRecalc', function () {
          let sideWidth = $('.inspirations-filter-row').width()
          let sidePos = $('.inspirations-filter-row').offset().left
          inspirations_fixed_sidebar(sideWidth, sidePos)

          $(window)
            .off('scroll.stickyInspirationFilter')
            .on('scroll.stickyInspirationFilter', function () {
              inspirations_fixed_sidebar(sideWidth, sidePos)
            })
        })

      function inspirations_fixed_sidebar(sideWidth, sidePos) {
        if ($(window).width() > 800) {
          let headerHeight = $('.header_billo').outerHeight()
          let parentHeight = $('.inspirations-filter-row').height()
          let parentOffset =
            $('.inspirations-filter-row').offset().top - headerHeight - 32
          let windowScroll = $(window).scrollTop()
          let bottomThreshold = parentOffset + parentHeight
          let filterHeight = 0
          $('.inspirations-filter')
            .children()
            .each(function () {
              filterHeight += $(this).outerHeight(true)
            })
          let filterScroll = windowScroll + filterHeight

          if (windowScroll > parentOffset && filterScroll < bottomThreshold) {
            $('.inspirations-filter-row .inspirations-filter')
              .removeClass('bottom')
              .addClass('fixed')

            let textPos = windowScroll - parentOffset

            $('.inspirations-filter-row .inspirations-filter').css({
              top: headerHeight + 'px',
              left: sidePos + 'px',
              width: sideWidth + 'px',
              height: filterHeight + 'px',
            })
          } else if (filterScroll >= bottomThreshold) {
            $('.inspirations-filter-row .inspirations-filter')
              .removeClass('fixed')
              .addClass('bottom')

            $('.inspirations-filter-row .inspirations-filter').css({
              top: 'unset',
              left: '0',
              width: sideWidth + 'px',
              bottom: '0',
              height: 'auto',
            })
          } else {
            $('.inspirations-filter-row .inspirations-filter').removeClass(
              'fixed bottom',
            )

            $('.inspirations-filter-row .inspirations-filter').css({
              top: '0',
              left: '0',
              width: sideWidth + 'px',
              bottom: 'unset',
              height: 'auto',
            })
          }
        } else {
          $('.inspirations-filter-row .inspirations-filter').removeClass(
            'fixed bottom',
          )
          $('.inspirations-filter-row .inspirations-filter').css({
            top: 'unset',
            left: 'unset',
            width: '100%',
            bottom: 'unset',
          })
        }
      }
    }

    if ($('.background-accordion').length > 0) {
      $(window)
        .off(
          'load.mobileInspirationsAccordionLazyLoad resize.mobileInspirationsAccordionLazyLoad scroll.mobileInspirationsAccordionLazyLoad',
        )
        .on(
          'load.mobileInspirationsAccordionLazyLoad resize.mobileInspirationsAccordionLazyLoad scroll.mobileInspirationsAccordionLazyLoad',
          function (e) {
            if ($(window).width() < 769) {
              let activeID = ''
              if (
                $('.background-accordion .mobile-accordion-button.active')
                  .length > 0
              ) {
                activeID = $(
                  '.background-accordion .mobile-accordion-button.active',
                ).data('id')
              } else {
                activeID = $('.background-accordion .mobile-accordion-button')
                  .first()
                  .data('id')
              }

              let poster = $(
                '.background-accordion #' +
                  activeID +
                  ' .only-for-mobile-video.lazyload-video',
              ).attr('src')
              let videoUrl = $(
                '.background-accordion #' +
                  activeID +
                  ' .only-for-mobile-video.lazyload-video',
              ).data('video-url')

              $(
                `
                        <video class="video-player ads-accordion" style="display: none;" poster="` +
                  poster +
                  `" type="video/mp4" autoplay="true" preload="true" muted="true" loop="true" playsinline="true">
                            <source src="` +
                  videoUrl +
                  `" type="video/mp4">
    					</video>
                    `,
              ).insertAfter(
                $(
                  '.background-accordion #' +
                    activeID +
                    ' .only-for-mobile-video.lazyload-video',
                ),
              )

              $(
                '.background-accordion #' + activeID + ' .accordion-text-div',
              ).find('video')[0].onloadeddata = function () {
                $(this)[0].play()
                $(this).show()
                $(this).prop('muted', true)
                $(
                  '.background-accordion #' +
                    activeID +
                    ' .only-for-mobile-video.lazyload-video',
                ).remove()
              }

              $(window).off(
                'load.mobileInspirationsAccordionLazyLoad resize.mobileInspirationsAccordionLazyLoad scroll.mobileInspirationsAccordionLazyLoad',
              )
            }
          },
        )

      $(window)
        .off(
          'load.inspirationsAccordionLazyLoad resize.inspirationsAccordionLazyLoad scroll.inspirationsAccordionLazyLoad',
        )
        .on(
          'load.inspirationsAccordionLazyLoad resize.inspirationsAccordionLazyLoad scroll.inspirationsAccordionLazyLoad',
          function (e) {
            if ($('.background-accordion').isInViewport()) {
              if ($(window).width() > 768) {
                if (
                  $('.background-accordion .tabs-buttons .button-tab.active')
                    .length > 0
                ) {
                  let activeID = $(
                    '.background-accordion .tabs-buttons .button-tab.active',
                  ).data('id')
                  let poster = $(
                    '.background-accordion #' +
                      activeID +
                      ' .img-video-div .lazyload-video',
                  ).attr('src')
                  let videoUrl = $(
                    '.background-accordion #' +
                      activeID +
                      ' .img-video-div .lazyload-video',
                  ).data('video-url')

                  $(
                    '.background-accordion #' + activeID + ' .img-video-div',
                  ).append(
                    `
                                <video class="video-player ads-accordion" style="display: none;" poster="` +
                      poster +
                      `" type="video/mp4" autoplay="true" preload="true" muted="true" loop="true" playsinline="true">
                                    <source src="` +
                      videoUrl +
                      `" type="video/mp4">
            					</video>
                            `,
                  )

                  $(
                    '.background-accordion #' + activeID + ' .img-video-div',
                  ).find('video')[0].onloadeddata = function () {
                    $(this)[0].play()
                    $(this).show()
                    $(this).prop('muted', true)
                    $(
                      '.background-accordion #' +
                        activeID +
                        ' .img-video-div .lazyload-video',
                    ).remove()
                  }

                  $(window).off(
                    'load.inspirationsAccordionLazyLoad resize.inspirationsAccordionLazyLoad scroll.inspirationsAccordionLazyLoad',
                  )
                }
              }
            }
          },
        )

      $('.background-accordion .tabs-buttons .button-tab')
        .off('click.lazyLoadInpirationsTab')
        .on('click.lazyLoadInpirationsTab', function (e) {
          let activeID = $(this).data('id')

          if (
            $(
              '.background-accordion #' +
                activeID +
                ' .img-video-div .lazyload-video',
            ).length > 0
          ) {
            let lazyLoadImg = $(
              '.background-accordion #' +
                activeID +
                ' .img-video-div .lazyload-video',
            )
            let poster = lazyLoadImg.attr('src')
            let videoUrl = lazyLoadImg.data('video-url')
            $('.background-accordion #' + activeID + ' .img-video-div').append(
              `
                        <video class="video-player ads-accordion" style="display: none;" poster="` +
                poster +
                `" type="video/mp4" autoplay="true" preload="true" muted="true" loop="true" playsinline="true">
                            <source src="` +
                videoUrl +
                `" type="video/mp4">
    					</video>
                    `,
            )

            $('.background-accordion #' + activeID + ' .img-video-div').find(
              'video',
            )[0].onloadeddata = function () {
              $(this)[0].play()
              $(this).show()
              $(this).prop('muted', true)
              $(
                '.background-accordion #' +
                  activeID +
                  ' .img-video-div .lazyload-video',
              ).remove()
            }
          }

          if (
            $('.background-accordion .accordion-tab .video-player').length > 0
          ) {
            $('.background-accordion .accordion-tab .video-player').each(
              function () {
                $(this).get(0).pause()
              },
            )

            $('.background-accordion #' + activeID + ' .video-player')
              .get(0)
              .play()
          }
        })

      $('.background-accordion .mobile-accordion-button')
        .off('click.mobileAccordionTabLazy')
        .on('click.mobileAccordionTabLazy', function () {
          let activeID = $(this).data('id')
          if (
            $(
              '.background-accordion #' +
                activeID +
                ' .only-for-mobile-video.lazyload-video',
            ).length > 0
          ) {
            let lazyLoadImg = $(
              '.background-accordion #' +
                activeID +
                ' .only-for-mobile-video.lazyload-video',
            )
            let poster = lazyLoadImg.attr('src')
            let videoUrl = lazyLoadImg.data('video-url')
            $(
              `
                        <video class="video-player ads-accordion" style="display: none;" poster="` +
                poster +
                `" type="video/mp4" autoplay="true" preload="true" muted="true" loop="true" playsinline="true">
                            <source src="` +
                videoUrl +
                `" type="video/mp4">
    					</video>
                    `,
            ).insertAfter(
              $(
                '.background-accordion #' +
                  activeID +
                  ' .only-for-mobile-video.lazyload-video',
              ),
            )

            $(
              '.background-accordion #' + activeID + ' .accordion-text-div',
            ).find('video')[0].onloadeddata = function () {
              $(this)[0].play()
              $(this).show()
              $(this).prop('muted', true)
              $(
                '.background-accordion #' +
                  activeID +
                  ' .only-for-mobile-video.lazyload-video',
              ).remove()
            }
          }

          if (
            $(
              '.background-accordion .accordion-tab .accordion-inner-div .mobile-accordion-video .video-player',
            ).length > 0
          ) {
            $(
              '.background-accordion .accordion-tab .accordion-inner-div .mobile-accordion-video .video-player',
            ).each(function () {
              $(this).get(0).pause()
            })

            if (!$(this).hasClass('active')) {
              $(
                '.background-accordion #' +
                  activeID +
                  ' .accordion-inner-div .mobile-accordion-video .video-player',
              )
                .get(0)
                .pause()
            } else {
              $(
                '.background-accordion #' +
                  activeID +
                  ' .accordion-inner-div .mobile-accordion-video .video-player',
              )
                .get(0)
                .play()
            }
          }
        })

      $('.background-accordion .accordion-tab .img-video-div')
        .off('click.toggleInspirationAccordionSound')
        .on('click.toggleInspirationAccordionSound', function () {
          if ($(this).find('video').length > 0) {
            if ($(this).hasClass('with-sound')) {
              $(this).removeClass('with-sound')
              $(this).find('video').prop('muted', true)
            } else {
              $(this).addClass('with-sound')
              $(this).find('video').prop('muted', false)
            }
          }
        })

      $(
        '.background-accordion .accordion-tab .accordion-inner-div .mobile-accordion-video',
      )
        .off('click.toggleMobileInspirationsAccordionSound')
        .on('click.toggleMobileInspirationsAccordionSound', function () {
          if ($(this).find('video').length > 0) {
            if ($(this).hasClass('with-sound')) {
              $(this).removeClass('with-sound')
              $(this).find('video').prop('muted', true)
            } else {
              $(this).addClass('with-sound')
              $(this).find('video').prop('muted', false)
            }
          }
        })
    }
  })
})(jQuery);

(function ($) {
  $(document).ready(function () {
    if (
      $('.stock-ads-lp-container .stock-ads-lp-row .stock-ad-card').length > 0
    ) {
      $('body').append(
        $(`
                <div class="ads-popup-container" style="display: none;">
                    <div class="ads-popup-close-container">
                    </div>
                    <div class="ads-popup-wrapper">
                        <div class="ads-popup-content">
                            <div class="ads-popup-video">
                                <div class="ads-popup-price">
                                    <span></span>
                                </div>
                            </div>
                            <div class="ads-popup-bottom">
                                <div class="ads-popup-close-button">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                            <line x1="1" y1="12.5858" x2="12.5858" y2="1" stroke="#4A0EFB" stroke-width="2" stroke-linecap="round"/>
                                            <line x1="1.41421" y1="1" x2="13" y2="12.5858" stroke="#4A0EFB" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="stock-ad-form-wrapper">
                                <div class="stock-ad-form-success" style="display: none;">
                                    <p>Thank you for placing your order! Your new video ad will be delivered within 2 business days, and you'll receive an email notification when it’s uploaded to the Billo platform.</p>
                                    <p>If you're not completely satisfied, you can request one free edit.</p>
                                    <p>Keep the momentum going! Order another ad today!</p>
                                </div>
                                <div class="stock-ad-form">
                                    <div class="ad-form-row">
                                        <label for="email">Your email address:</label>
                                        <input type="email" id="email" name="email">
                                    </div>
                                    <div class="ad-form-row">
                                        <label for="product-link">Your product link:</label>
                                        <input type="text" id="product-link" name="product-link">
                                    </div>
                                    <div class="ad-form-row">
                                        <label for="notes">Notes for editors:</label>
                                        <textarea id="notes" name="notes"></textarea>
                                    </div>
                                    <div class="ad-form-row agreement-field">
                                        <input type="checkbox" id="agreement" name="agreement">
                                        <label for="agreement">Do you agree to have the <span class="insert-price"></span> payment for this order deducted from your Billo balance or charged from your added payment card?</label>
                                    </div>
                                    <div class="ad-form-submit-row">
                                        <input type="hidden" id="ad-name" value="">
                                        <button class="submit-ad-form">Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `),
      )

      $('.stock-ad-card .ad-poster')
        .off('click.openAdPopup')
        .on('click.openAdPopup', function () {
          let title = $(this).data('title')
          let price = $(this).data('price')
          let video = $(this).data('video-url')
          let poster = $(this).data('poster')
          $('.ads-popup-content .ads-popup-video .ads-popup-price span').text(
            price,
          )
          $('.stock-ad-form .ad-form-row.agreement-field .insert-price').text(
            price,
          )

          $('.ads-popup-content .ads-popup-video').append(
            $(
              `
                    <video class="stock-ads-video" controls controlsList="nodownload" playsinline="true" width="100%" style="object-fit: cover;" autoplay="false" muted="true" loop="true" preload="auto" poster="` +
                poster +
                `">
    	                <source src="` +
                video +
                `">
    	            </video>
                `,
            ),
          )

          $('.stock-ad-form .ad-form-submit-row input#ad-name').val(title)

          $('.ads-popup-content .ads-popup-video .stock-ads-video')
            .get(0)
            .play()
          $('.ads-popup-container').show()
          $('html').addClass('no-scroll')
          $('.stock-ads-video').prop('muted', false)
        })

      $('.stock-ad-card .ad-bottom .ad-cta')
        .off('click.ctaOpenAdPopup')
        .on('click.ctaOpenAdPopup', function () {
          let posterEl = $(this).parent().siblings('.ad-poster')
          let title = posterEl.data('title')
          let price = posterEl.data('price')
          let video = posterEl.data('video-url')
          let poster = posterEl.data('poster')

          $('.ads-popup-content .ads-popup-video .ads-popup-price span').text(
            price,
          )
          $('.stock-ad-form .ad-form-row.agreement-field .insert-price').text(
            price,
          )

          $('.ads-popup-content .ads-popup-video').append(
            $(
              `
                    <video class="stock-ads-video" controls controlsList="nodownload" playsinline="true" width="100%" style="object-fit: cover;" autoplay="false" muted="true" loop="true" preload="auto" poster="` +
                poster +
                `">
    	                <source src="` +
                video +
                `">
    	            </video>
                `,
            ),
          )

          $('.stock-ad-form .ad-form-submit-row input#ad-name').val(title)

          $('.ads-popup-content .ads-popup-video .stock-ads-video')
            .get(0)
            .play()
          $('.ads-popup-container').show()
          $('html').addClass('no-scroll')
          $('.stock-ads-video').prop('muted', false)
        })

      $('.ads-popup-close-button')
        .off('click')
        .on('click', function () {
          popupCloseEvents()
        })

      $('.ads-popup-container .ads-popup-close-container')
        .off('click.closeAdsPopup')
        .on('click.closeAdsPopup', function () {
          popupCloseEvents()
        })

      function popupCloseEvents() {
        $('.ads-popup-content .ads-popup-video .ads-popup-price span').text('')
        $('.stock-ad-form .ad-form-row.agreement-field .insert-price').text('')
        $('.ads-popup-content .ads-popup-video .stock-ads-video').attr(
          'poster',
          '',
        )
        $('.ads-popup-content .ads-popup-video .stock-ads-video').get(0).pause()
        $('.ads-popup-content .ads-popup-video .stock-ads-video').get(
          0,
        ).currentTime = 0
        $('.ads-popup-content .ads-popup-video .stock-ads-video').remove()
        $('.stock-ad-form .ad-form-submit-row input#ad-name').val('')
        $('.stock-ad-form-wrapper .stock-ad-form').show()
        $('.stock-ad-form-wrapper .stock-ad-form-success').hide()
        $('.ads-popup-container').hide()
        $('html').removeClass('no-scroll')
        $('.stock-ad-form .ad-form-row').removeClass('error')
        $('.stock-ad-form .ad-form-row .form-error').remove()
      }
    }
  })
})(jQuery);

(function ($) {
  $(document).ready(function () {
    if ($('.bf-sidebar').length > 0) {
      let pageUrl =
        window.location.protocol +
        '//' +
        window.location.host +
        window.location.pathname
      let lastScrollTop = 0

      function findClosestBFH2() {
        var scrollTop = $(window).scrollTop()
        var h2Elements = $('.bf-tabs-section').parent().find('h2')
        var closestH2 = null
        var closestDistance = Infinity

        h2Elements.each(function () {
          var distance = Math.abs(scrollTop - $(this).offset().top)

          if (distance < closestDistance) {
            closestDistance = distance
            closestH2 = $(this).children('a').attr('id')
          }
        })

        return closestH2
      }

      $('.sidebar-buttons .copy-button')
        .off('click.copyActiveSection')
        .on('click.copyActiveSection', function () {
          let button = $(this)
          button.addClass('active')

          setTimeout(function () {
            button.removeClass('active')
          }, 3000)

          let sectionId = $(this).attr('data-section-id')
          let tempInput = $('<input>')

          $('body').append(tempInput)
          tempInput.val(sectionId).select()
          document.execCommand('copy')
          tempInput.remove()
        })

      $('.video-div-left')
        .off('click.toggleBFSound')
        .on('click.toggleBFSound', function () {
          if ($(this).find('video').length > 0) {
            if ($(this).hasClass('with-sound')) {
              $(this).removeClass('with-sound')
              $(this).find('video').prop('muted', true)
            } else {
              $(this).addClass('with-sound')
              $(this).find('video').prop('muted', false)
            }
          }
        })

      $(window)
        .off('load.bfLazyVideo resize.bfLazyVideo scroll.bfLazyVideo')
        .on('load.bfLazyVideo resize.bfLazyVideo scroll.bfLazyVideo', function (
          e,
        ) {
          if ($('.video-div-left img').not('.loaded').length > 0) {
            $('.video-div-left img')
              .not('.loaded')
              .each(function () {
                if ($(this).isInViewport()) {
                  $(this).addClass('loaded')
                  let videoUrl = $(this).data('video-url')
                  let posterUrl = $(this).data('poster-url')
                  let image = $(this)

                  $(this)
                    .parent()
                    .append(
                      `
                                <video class="lazy-video active" playsinline="true" width="100%" style="display: none; object-fit: cover;" autoplay="false" muted="true" loop="true" preload="auto" poster="` +
                        posterUrl +
                        `">
                        		    <source src="` +
                        videoUrl +
                        `">
                        		</video>
                            `,
                    )

                  $(this)
                    .parent()
                    .find('video.lazy-video')[0].onloadeddata = function () {
                    $(this)[0].play()
                    $(this).show()
                    image.remove()
                  }

                  return false
                }
              })
          } else {
            $(window).off(
              'load.bfLazyVideo resize.bfLazyVideo scroll.bfLazyVideo',
            )
          }
        })

      function bfScrollevents() {
        if ($(window).width() > 767) {
          if (
            $('.fusion-tb-header').length > 0 &&
            $('.fusion-tb-header').hasClass('topSticky')
          ) {
            let headerHeight =
              $(
                '.fusion-fullwidth.fullwidth-box.fusion-builder-row-2.fusion-flex-container',
              ).outerHeight(true) - 1
            let firstOffset = $('.bf-tabs-section').offset().top
            let firstHeight = $('.bf-tabs-section').height()
            let firstBottom = firstOffset + firstHeight
            let leftOffset = $('.bf-tabs-section').parent().offset().top
            let leftHeight = $('.bf-tabs-section').parent().height()
            let leftBottom = leftOffset + leftHeight
            let firstTop = firstOffset - headerHeight
            let scrollPos = $(window).scrollTop() - 32
            let tableLeft =
              $('.bf-tabs-section').offset().left +
              $('.bf-tabs-section').width()
            let tableWidth = $('.black-friday-sidebar').parent().width()
            let tableHeight = $('.black-friday-sidebar').outerHeight(true)

            let tableOffsetTop = $('.black-friday-sidebar').offset().top
            let st = $(this).scrollTop()
            let sideBarHeight =
              $('.bf-toc-sidebar').outerHeight(true) +
              $('.sidebar-right').outerHeight(true)
            let bottomBreak = st + sideBarHeight + headerHeight + 80
            let firstWidth = $('.bf-tabs-section').width()
            let firstLeftOffset = $('.bf-tabs-section').offset().left

            let headerBreak =
              $('.bf-tabs-section').offset().top +
              $('.bf-tabs-section').height() -
              headerHeight
            let scrollHeadBreak = st + headerHeight
            let sidebarGap = 80

            if (st > lastScrollTop) {
              /** Scrolling down **/
              $('.bf-tabs-section .table-heading h2').each(function () {
                if (
                  $(this).offset().top - $(window).scrollTop() >= 0 &&
                  $(this).offset().top - $(window).scrollTop() <= 101
                ) {
                  let closestID = $(this).children('a').attr('id')

                  let activeHeader = $('#' + closestID)
                    .parents()
                    .closest('.table-heading')
                    .find('.pseudo-heading')

                  $('.table-heading .pseudo-heading')
                    .not(activeHeader)
                    .removeClass('active')
                  activeHeader.addClass('active')
                  activeHeader.css({
                    width: firstWidth + 'px',
                    left: firstLeftOffset + 'px',
                    top: headerHeight + 'px',
                  })
                  return false
                }
              })

              $('.bf-tabs-section')
                .parent()
                .find('h2')
                .each(function () {
                  if (
                    $(this).offset().top - $(window).scrollTop() >= 0 &&
                    $(this).offset().top - $(window).scrollTop() <= 150
                  ) {
                    let closestID = $(this).children('a').attr('id')
                    $('.bf-toc-sidebar .quick_links .toc')
                      .find('li')
                      .removeClass('active')

                    $('.bf-toc-sidebar .quick_links')
                      .find('a[href="#' + closestID + '"]')
                      .parent()
                      .addClass('active')

                    $('.sidebar-buttons .copy-button').attr(
                      'data-section-id',
                      pageUrl + '#' + closestID,
                    )

                    return false
                  }
                })

              if (scrollHeadBreak >= headerBreak - 40) {
                $('.table-heading .pseudo-heading').last().css({
                  'border-bottom-left-radius': '32px',
                  'border-bottom-right-radius': '32px',
                })
              }

              if (scrollHeadBreak >= headerBreak) {
                $('.table-heading .pseudo-heading').removeClass('active')
              }
            } else {
              /** Scrolling up **/
              closestH2 = findClosestBFH2()
              $('.sidebar-buttons .copy-button').attr(
                'data-section-id',
                pageUrl + '#' + closestH2,
              )
              $('.bf-toc-sidebar .quick_links .toc')
                .find('li')
                .removeClass('active')
              $('.bf-toc-sidebar .quick_links')
                .find('a[href="#' + closestH2 + '"]')
                .parent()
                .addClass('active')

              let closestElement = null
              let minDistance = Infinity

              $('.table-heading').each(function () {
                let elementTop = $(this).offset().top
                let pseudoOffset = 100

                if (
                  $(this).find('.pseudo-heading').index('.pseudo-heading') == 0
                ) {
                  pseudoOffset = 0
                }

                if (st >= elementTop - pseudoOffset) {
                  closestElement = $(this)
                } else {
                  return false
                }
              })

              if (scrollHeadBreak <= headerBreak) {
                if (closestElement) {
                  let activeHeader = closestElement.find('.pseudo-heading')
                  $('.table-heading .pseudo-heading')
                    .not(activeHeader)
                    .removeClass('active')
                  activeHeader.addClass('active')
                  activeHeader.css({
                    width: firstWidth + 'px',
                    left: firstLeftOffset + 'px',
                    top: headerHeight + 'px',
                  })
                  if (activeHeader.index('.pseudo-heading') == 5) {
                    let borderLimit = headerBreak - scrollHeadBreak

                    if (borderLimit < 40) {
                      activeHeader.css({
                        'border-bottom-left-radius': '32px',
                        'border-bottom-right-radius': '32px',
                      })
                    } else {
                      activeHeader.css({
                        'border-bottom-left-radius': '0',
                        'border-bottom-right-radius': '0',
                      })
                    }
                  }
                } else {
                  $('.table-heading .pseudo-heading').removeClass('active')
                }
              }
            }

            lastScrollTop = st

            if (scrollPos < firstTop - sidebarGap) {
              $('.black-friday-sidebar').removeClass('fixed')
              $('.black-friday-sidebar').addClass('sticky')
              $('.black-friday-sidebar').css({
                left: '0',
                top: '0',
                width: tableWidth + 'px',
              })
            } else if (scrollPos >= firstTop - sidebarGap) {
              if ($('.black-friday-sidebar').hasClass('fixed')) {
                if (bottomBreak >= leftBottom - headerHeight - sidebarGap) {
                  setTimeout(function () {
                    let refreshHeight = $('.black-friday-sidebar').outerHeight(
                      true,
                    )
                    $('.black-friday-sidebar').removeClass('fixed')
                    $('.black-friday-sidebar').addClass('locked')
                    $('.black-friday-sidebar').css({
                      top: leftHeight - refreshHeight + 'px',
                      left: '0px',
                      width: tableWidth + 'px',
                    })
                  }, 10)
                } else {
                  $('.black-friday-sidebar').removeClass('locked')
                  $('.black-friday-sidebar').addClass('fixed')
                  $('.black-friday-sidebar').css({
                    left: tableLeft + 'px',
                    width: tableWidth + 'px',
                  })
                }
              } else if ($('.black-friday-sidebar').hasClass('locked')) {
                if (bottomBreak < leftBottom - headerHeight - sidebarGap) {
                  $('.black-friday-sidebar').removeClass('locked')
                  $('.black-friday-sidebar').addClass('fixed')
                  $('.black-friday-sidebar').css({
                    left: tableLeft,
                    width: tableWidth + 'px',
                  })
                }
              } else {
                $('.black-friday-sidebar').removeClass('sticky')
                $('.black-friday-sidebar').addClass('fixed')
                $('.black-friday-sidebar').css({
                  left: tableLeft,
                  width: tableWidth + 'px',
                })
              }
            }
          }
        } else {
          $('.pseudo-heading').removeClass('active')
          $('.black-friday-sidebar').removeClass('sticky fixed locked')
        }
      }

      $(window).on('scroll', function () {
        bfScrollevents()
      })

      bfScrollevents()

      $(window).on('load', function () {
        if (
          !$('.fusion-tb-header').hasClass('topSticky') &&
          $(window).scrollTop() > 300
        ) {
          $('.fusion-tb-header').addClass('topSticky')
          setTimeout(function () {
            let currentScroll = $(window).scrollTop()
            $(window).scrollTop(currentScroll + 1)
            $(window).trigger('scroll')
          }, 500)
        }
      })

      $(window).on('resize', function () {
        bfScrollevents()
      })
    }
  })
})(jQuery);

(function ($) {
  $(window).on('load', function () {
    if (
      $('.hero-second-section .meta-block').length > 0 &&
      $('.hero-second-section .tiktok-block').length > 0
    ) {
      $(
        '.hero-second-section .meta-block, .hero-second-section .tiktok-block',
      ).css({
        filter: 'none',
      })
      if ($(window).width() > 800) {
        setTimeout(function () {
          $('.hero-second-section .meta-block').addClass('transform')
          setTimeout(function () {
            $('.hero-second-section .tiktok-block').addClass('transform')
          }, 500)
        }, 500)
      }
    }
  })

  $(document).ready(function () {
    if (
      $('#creators-section').length > 0 &&
      $('.connect-creators-sections').length > 0
    ) {
      let imageLoadLength = 0
      let imageLength = $(
        '#creators-section .item-content-top .lazy-creator-img, #creators-section .creators-info-wrapper .creators-avatar img',
      ).length

      if ($('.connect-creators-sections').hasClass('loading-animation')) {
        $(
          '#creators-section .item-content-top .lazy-creator-img, #creators-section .creators-info-wrapper .creators-avatar img',
        ).each(function () {
          if (this.complete) {
            imageLoadLength++

            if (imageLoadLength == imageLength) {
              setTimeout(function () {
                $('.connect-creators-sections').removeClass('loading-animation')
              }, 500)
            }
          } else {
            $(this).on('load', function () {
              imageLoadLength++

              if (imageLoadLength == imageLength) {
                setTimeout(function () {
                  $('.connect-creators-sections').removeClass(
                    'loading-animation',
                  )
                }, 500)
              }
            })
          }
        })
      }
    }

    if (
      $('.hero-video-block .fusion-selfhosted-video .video-wrapper').length > 0
    ) {
      $('.hero-video-block')
        .off('click.lpTOFHeroVideoSoundToggle')
        .on('click.lpTOFHeroVideoSoundToggle', function () {
          $('.hero-video-block')
            .toggleClass('with-sound')
            .promise()
            .done(function () {
              if ($(this).hasClass('with-sound')) {
                $(
                  '.hero-video-block .fusion-selfhosted-video .video-wrapper video',
                ).prop('muted', false)
              } else {
                $(
                  '.hero-video-block .fusion-selfhosted-video .video-wrapper video',
                ).prop('muted', true)
              }
            })
        })
    }

    if ($('#creators-section .creators-filter-block').length > 0) {
      tofCreatorEvents()

      $(
        '.creators-selected-category-block .creators-filter-block .creators-selected-category-block',
      )
        .off('click.tofMobileFilter')
        .on('click.tofMobileFilter', function () {
          $('.creators-filter-block .creators-filter-wrapper').slideToggle()
          $(this).find('svg').toggleClass('rotate')
        })

      if (typeof tofCreatorsData !== 'undefined') {
        $('.creators-filter-block .creators-filter-wrapper .creators-item')
          .off('click.tofLoadIndustry')
          .on('click.tofLoadIndustry', function () {
            if ($(this).hasClass('active')) {
              return false
            }

            $('.creators-filter-block .creators-item').removeClass('active')
            $(this).addClass('active')
            let filterID = $(this).data('id')
            let activeHtml = $(this).html()
            $(
              '.creators-selected-category-block .creators-item.creators-item-selected',
            ).html(activeHtml)
            $('.creators-visual-wrapper').empty()
            $('.creators-visual-wrapper').append(tofCreatorsData[filterID])

            if (
              $('#creators-section').length > 0 &&
              $('.connect-creators-sections').length > 0
            ) {
              $('.connect-creators-sections').addClass('loading-animation')
              let imageLoadLength = 0
              let imageLength = $(
                '#creators-section .item-content-top .lazy-creator-img, #creators-section .creators-info-wrapper .creators-avatar img',
              ).length

              $(
                '#creators-section .item-content-top .lazy-creator-img, #creators-section .creators-info-wrapper .creators-avatar img',
              ).each(function () {
                if (this.complete) {
                  imageLoadLength++

                  if (imageLoadLength == imageLength) {
                    setTimeout(function () {
                      $('.connect-creators-sections').removeClass(
                        'loading-animation',
                      )
                    }, 500)
                  }
                } else {
                  $(this).on('load', function () {
                    imageLoadLength++

                    if (imageLoadLength == imageLength) {
                      setTimeout(function () {
                        $('.connect-creators-sections').removeClass(
                          'loading-animation',
                        )
                      }, 500)
                    }
                  })
                }
              })
            }

            if ($(window).width() < 801) {
              $('.creators-filter-block .creators-filter-wrapper').slideToggle()
              $(this).find('svg').toggleClass('rotate')
            }

            tofCreatorEvents()
          })
      }
    }

    if (
      $('#creators-section').length > 0 &&
      $('#creators-section').hasClass('no-filter')
    ) {
      tofCreatorEvents()
    }

    function tofCreatorEvents() {
      $('.creators-visual-item .item-content-top')
        .off('click.tofLoadVideo')
        .on('click.tofLoadVideo', function (e) {
          if ($(e.target).hasClass('creators-video-sound-block')) {
            return false
          }

          if ($(this).hasClass('loaded')) {
            let video = $(this).find('.lazy-video')

            if ($(this).find('video.lazy-video.active').length > 0) {
              video.removeClass('active')
              $(this).removeClass('playing')
              video.get(0).pause()
            } else {
              if (
                $(
                  '.creators-visual-wrapper .creators-visual-item .item-content-top video.lazy-video.active',
                ).length > 0
              ) {
                $(
                  '.creators-visual-wrapper .creators-visual-item .item-content-top video.lazy-video.active',
                )
                  .get(0)
                  .pause()
                $(
                  '.creators-visual-wrapper .creators-visual-item .item-content-top video.lazy-video.active',
                ).removeClass('active')
                $(
                  '.creators-visual-wrapper .creators-visual-item .item-content-top',
                ).removeClass('playing')
              }

              video.addClass('active')
              $(this).addClass('playing')
              video.get(0).play()
            }

            return false
          }

          $(
            '.creators-visual-wrapper .creators-visual-item .item-content-top video.lazy-video.active',
          ).each(function () {
            $(this).removeClass('active')
            $(this).parent().removeClass('playing')
            $(this).get(0).pause()
          })

          let _this = $(this)
          let image = $(this).find('img.lazy-creator-img')
          let videoUrl = image.data('video-url')
          let poster = image.data('poster-url')
          $(this).addClass('loaded')
          $(this).addClass('playing')
          $(this).addClass('with-sound')
          $(this).append(
            `
                    <video class="lazy-video active" playsinline="true" width="100%" style="display: none; object-fit: cover;" autoplay="false" muted="true" loop="true" preload="auto" poster="` +
              poster +
              `">
                        <source src="` +
              videoUrl +
              `">
                    </video>
                `,
          )

          _this.find('video.lazy-video')[0].onloadeddata = function () {
            $(this)[0].play()
            $(this).show()
            $(this).prop('muted', false)
            image.remove()
          }
        })

      $(
        '.connect-creators-sections .creators-visual-wrapper .creators-visual-item .item-content-top .creators-video-sound-block',
      )
        .off('click.tofToggleSound')
        .on('click.tofToggleSound', function () {
          let video = $(this).parent().find('video.lazy-video')
          if ($(this).parent().hasClass('with-sound')) {
            video.prop('muted', true)
          } else {
            video.prop('muted', false)
          }
          $(this).parent().toggleClass('with-sound')
        })
    }
  })
})(jQuery);

(function ($) {
  $(document).ready(function () {
    if ($('.testimonial-hero').length > 0) {
      $('.answer1').hide()
      $('.question1').click(function () {
        var $answer = $(this).siblings('.answer1')
        var $faq = $(this).parent('.faq1')
        var isActive = $(this).hasClass('active')
        $('.answer1').slideUp('fast')
        $('.question1').removeClass('active')
        $('.faq1').removeClass('rotate')
        if (!isActive) {
          $(this).addClass('active')
          $answer.slideDown('fast')
          $faq.addClass('rotate')
        }
      })
      $(window)
        .off(
          'load.testimonialHeroLazyLoad resize.testimonialHeroLazyLoad scroll.testimonialHeroLazyLoad',
        )
        .on(
          'load.testimonialHeroLazyLoad resize.testimonialHeroLazyLoad scroll.testimonialHeroLazyLoad',
          function (e) {
            if ($('.testimonial-hero .lazyload-video').isInViewport()) {
              let image = $('.testimonial-hero .lazyload-video')
              let adsVideoUrl = $('.testimonial-hero .lazyload-video').data(
                'video-url',
              )
              let adsPosterUrl = $('.testimonial-hero .lazyload-video').data(
                'poster-url',
              )
              $('.testimonial-hero').append(
                `<video autoplay muted loop playsinline="true"class="lazy-loaded"poster="` +
                  adsPosterUrl +
                  `"style="display: none;"><source src="` +
                  adsVideoUrl +
                  `"type="video/mp4"></video>`,
              )
              $(
                '.testimonial-hero video.lazy-loaded',
              )[0].onloadeddata = function () {
                $(this)[0].play()
                $(this).show()
                image.remove()
              }
              $('.testimonial-hero video.lazy-loaded')
                .off('click.toggleTestimonialHeroSound')
                .on('click.toggleTestimonialHeroSound', function () {
                  if ($(this).parent().hasClass('with-sound')) {
                    $(this).prop('muted', true)
                    $(this).parent().removeClass('with-sound')
                  } else {
                    $(this).prop('muted', false)
                    $(this).parent().addClass('with-sound')
                  }
                })
              $('.testimonial-hero .video-sound-block')
                .off('click.toggleTestimonialHeroSoundBlock')
                .on('click.toggleTestimonialHeroSoundBlock', function () {
                  if (
                    $('.testimonial-hero video.lazy-loaded')
                      .parent()
                      .hasClass('with-sound')
                  ) {
                    $('.testimonial-hero video.lazy-loaded').prop('muted', true)
                    $('.testimonial-hero video.lazy-loaded')
                      .parent()
                      .removeClass('with-sound')
                  } else {
                    $('.testimonial-hero video.lazy-loaded').prop(
                      'muted',
                      false,
                    )
                    $('.testimonial-hero video.lazy-loaded')
                      .parent()
                      .addClass('with-sound')
                  }
                })
              $(window).off(
                'load.testimonialHeroLazyLoad resize.testimonialHeroLazyLoad scroll.testimonialHeroLazyLoad',
              )
            }
          },
        )
    }
    if (
      $('.order-testimonials-div .order-testimonials-div-right .lazyload-video')
        .length > 0
    ) {
      $(window)
        .off(
          'load.testimonialVideoLazyLoad resize.testimonialVideoLazyLoad scroll.testimonialVideoLazyLoad',
        )
        .on(
          'load.testimonialVideoLazyLoad resize.testimonialVideoLazyLoad scroll.testimonialVideoLazyLoad',
          function (e) {
            if (
              $(
                '.order-testimonials-div .order-testimonials-div-right .lazyload-video',
              ).isInViewport()
            ) {
              let image = $(
                '.order-testimonials-div .order-testimonials-div-right .lazyload-video',
              )
              let adsVideoUrl = $(
                '.order-testimonials-div .order-testimonials-div-right .lazyload-video',
              ).data('video-url')
              let adsPosterUrl = $(
                '.order-testimonials-div .order-testimonials-div-right .lazyload-video',
              ).data('poster-url')
              $('.order-testimonials-div .order-testimonials-div-right').append(
                `<video autoplay muted loop playsinline="true"class="lazy-loaded"poster="` +
                  adsPosterUrl +
                  `"style="display: none;"><source src="` +
                  adsVideoUrl +
                  `"type="video/mp4"></video>`,
              )
              $(
                '.order-testimonials-div .order-testimonials-div-right video.lazy-loaded',
              )[0].onloadeddata = function () {
                $(this)[0].play()
                $(this).show()
                image.remove()
              }
              $('.order-testimonials-div .order-testimonials-div-right')
                .off('click.testimonialVideoSound')
                .on('click.testimonialVideoSound', function () {
                  if ($(this).hasClass('with-sound')) {
                    $(this).removeClass('with-sound')
                    $(this).find('video.lazy-loaded').prop('muted', true)
                  } else {
                    $(this).addClass('with-sound')
                    $(this).find('video.lazy-loaded').prop('muted', false)
                  }
                })
              $(window).off(
                'load.testimonialVideoLazyLoad resize.testimonialVideoLazyLoad scroll.testimonialVideoLazyLoad',
              )
            }
          },
        )
    }
    if ($('.guide-section .guide-text-div .guide-link').length > 0) {
      let cardWidth = $('.guide-section.sticky-guide').width()
      if ($('.guide-section .slider').not('.slick-initialized').length > 0) {
        $('.guide-section .slider')
          .not('.slick-initialized')
          .slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            arrows: false,
            dots: false,
            infinite: false,
            centerMode: false,
            swipeToSlide: true,
            variableWidth: true,
            useCSS: false,
            responsive: [
              {
                breakpoint: 1296,
                settings: { slidesToShow: 3, slidesToScroll: 1 },
              },
              {
                breakpoint: 816,
                settings: { slidesToShow: 3, slidesToScroll: 1 },
              },
              {
                breakpoint: 648,
                settings: { slidesToShow: 2, slidesToScroll: 1 },
              },
            ],
          })
      }
      $('.guide-section .guide-text-div .guide-link')
        .off('click.testimonialCardShow')
        .on('click.testimonialCardShow', function (e) {
          if (!$(e.target).hasClass('show-btn')) {
            return false
          }
          let parentDiv = $(this)
            .closest('.guide-section')
            .find('.hidden-block')
          parentDiv.slideToggle(500)
          parentDiv.find('.slider').slick('setPosition')
          $(this)
            .toggleClass('open')
            .promise()
            .done(function () {
              if ($(window).width() > 900) {
                if ($(this).hasClass('open')) {
                  $(this).html('<a class="show-btn">Show less</a>')
                  if (
                    $(this).closest('.guide-section').hasClass('sticky-guide')
                  ) {
                    $(this)
                      .closest('.guide-section')
                      .css({ position: 'relative', top: 'unset' })
                  }
                } else {
                  $(this).html('<a class="show-btn">Show more</a>')
                  $(this)
                    .closest('.guide-section')
                    .css({ position: 'sticky', top: '110px' })
                }
              } else {
                if ($(this).hasClass('open')) {
                  $(this).html('<a class="show-btn">Show more</a>')
                  $(this).hide()
                }
              }
            })
        })
      $('.guide-section .guide-link .show-less-mobile')
        .off('click.testimonialCardHide')
        .on('click.testimonialCardHide', function () {
          let card = $(this).closest('.guide-section')
          card
            .find('.guide-text-div .guide-link.open')
            .removeClass('open')
            .show()
          card.find('.hidden-block').slideUp()
        })
    }
  })
})(jQuery);

(function ($) {
  $.fn.toc = function (options) {
    var settings = $.extend(
      {
        shorten: false,
        stripAfter: 50,
        scrollSpeed: 400,
        scrollOffset: 0,
        wrapWith: '<div class="toc_container"/>',
        container: 'body',
      },
      options,
    )
    var scrollToHeadline = function (target) {
      $('body, html').animate(
        { scrollTop: $(target).offset().top - settings.scrollOffset },
        settings.scrollSpeed,
        function () {},
      )
    }
    return this.each(function (index1) {
      var toc_container = $(settings.container),
        container = $(this),
        headlines = $(':header', container),
        toc = '<ul class="toc">'
      if (headlines.length == 0) {
        return
      }
      var level = headlines[0].tagName.replace(/[^\d]/g, '')
      headlines.each(function (index2, headline) {
        var cLevel = headline.tagName.replace(/[^\d]/g, '')
        var headlineId = 'hl_' + (index1 + 1) + (index2 + 1) + level
        var currentHeadlineHTML = $(headline).html()
        var currentHeadlineText = $(headline).text()
        var shortenedHeadlineText = currentHeadlineText
        if (settings.strip) {
          shortenedHeadlineText =
            shortenedHeadlineText.substring(0, settings.stripAfter) + '...'
        }
        $(this).html('<a id="' + headlineId + '">' + currentHeadlineHTML)
        toc +=
          '<li><a href="#' +
          headlineId +
          '" title="' +
          currentHeadlineText +
          '">' +
          shortenedHeadlineText +
          '</a></li>'
      })
      toc += '</ul>'
      toc_container.append($(toc))
      $('.toc', toc_container).wrap(settings.wrapWith)
      $('li a', $('.toc')).click(function (e) {
        e.preventDefault()
        var target = $(e.target).attr('href')
        scrollToHeadline(target)
      })
    })
  }
})(jQuery)
