(function (window, document, $, undefined) {
    "use strict";

    var smsInit = {
        i: function (e) {
            smsInit.s();
            smsInit.methods();
        },

        s: function (e) {
            (this._window = $(window)),
                (this._document = $(document)),
                (this._body = $("body")),
                (this._html = $("html"));
        },

        methods: function (e) {
            smsInit.w();
            smsInit.contactForm();
            smsInit.smsBackToTop();
            smsInit.stickyHeaderMenu();
            smsInit.mobileMenuActivation();
            smsInit.salActivation();
            smsInit.smsSlickActivation();
            smsInit.tiltAnimation();
            smsInit.menuLinkActive();
            smsInit.smsHover();
            smsInit.themeColorSet();
        },

        w: function (e) {
            this._window.on("load", smsInit.l).on("scroll", smsInit.res);
        },

        contactForm: function () {
            $(".sms-contact-forms").on("submit", function (e) {
                e.preventDefault();
                var _self = $(this);
                var _selector = _self.closest("input,textarea");
                _self.closest("div").find("input,textarea").removeAttr("style");
                _self.find(".error-msg").remove();
                _self
                    .closest("div")
                    .find('button[type="submit"]')
                    .attr("disabled", "disabled");
                var data = $(this).serialize();
                $.ajax({
                    url: "mail.php",
                    type: "post",
                    dataType: "json",
                    data: data,
                    success: function (data) {
                        _self
                            .closest("div")
                            .find('button[type="submit"]')
                            .removeAttr("disabled");
                        if (data.code === false) {
                            _self
                                .closest("div")
                                .find('[name="' + data.field + '"]');
                            _self
                                .find(".btn-primary")
                                .after(
                                    '<div class="error-msg"><p>*' +
                                        data.err +
                                        "</p></div>"
                                );
                        } else {
                            $(".error-msg").hide();
                            $(".form-group").removeClass("focused");
                            _self
                                .find(".btn-primary")
                                .after(
                                    '<div class="success-msg"><p>' +
                                        data.success +
                                        "</p></div>"
                                );
                            _self.closest("div").find("input,textarea").val("");

                            setTimeout(function () {
                                $(".success-msg").fadeOut("slow");
                            }, 5000);
                        }
                    },
                });
            });
        },

        smsBackToTop: function () {
            var btn = $("#backto-top");
            $(window).on("scroll", function () {
                if ($(window).scrollTop() > 300) {
                    btn.addClass("show");
                } else {
                    btn.removeClass("show");
                }
            });
            btn.on("click", function (e) {
                e.preventDefault();
                $("html, body").animate(
                    {
                        scrollTop: 0,
                    },
                    "300"
                );
            });
        },

        themeColorSet: function () {
            var prefersDarkMode =
                window.matchMedia &&
                window.matchMedia("(prefers-color-scheme: dark)").matches;
            if (prefersDarkMode) {
                var defaultColor = "active-dark-mode";

                if ($("body").hasClass("active-light-mode")) {
                    $("body").removeClass("active-light-mode");
                } else {
                    $("body").addClass(defaultColor);
                }
            } else {
                var defaultColor = "active-light-mode";

                if ($("body").hasClass("active-dark-mode")) {
                    $("body").removeClass("active-dark-mode");
                } else {
                    $("body").addClass(defaultColor);
                }
            }
        },

        stickyHeaderMenu: function () {
            $(window).on("scroll", function () {
                // Sticky Class Add
                if ($("body").hasClass("sticky-header")) {
                    var stickyPlaceHolder = $("#sms-sticky-placeholder"),
                        menu = $(".sms-mainmenu"),
                        menuH = menu.outerHeight(),
                        topHeaderH = $(".sms-header-top").outerHeight() || 0,
                        targrtScroll = topHeaderH + 200;
                    if ($(window).scrollTop() > targrtScroll) {
                        menu.addClass("sms-sticky");
                        stickyPlaceHolder.height(menuH);
                    } else {
                        menu.removeClass("sms-sticky");
                        stickyPlaceHolder.height(0);
                    }
                }
            });
        },

        mobileMenuActivation: function (e) {
            $(".menu-item-has-children > a").append(
                '<span class="submenu-toggle-btn"></span>'
            );

            $(".menu-item-has-children > a .submenu-toggle-btn").on(
                "click",
                function (e) {
                    var targetParent = $(this).parents(".mainmenu-nav"),
                        target = $(this).parent().siblings(".sms-submenu"),
                        targetSiblings = $(this)
                            .parents(".menu-item-has-children")
                            .siblings()
                            .find(".sms-submenu");

                    if (targetParent.hasClass("offcanvas")) {
                        $(target).slideToggle(400);
                        $(targetSiblings).slideUp(400);
                        $(this)
                            .parents(".menu-item-has-children")
                            .toggleClass("open");
                        $(this)
                            .parents(".menu-item-has-children")
                            .siblings()
                            .removeClass("open");
                    }
                }
            );

            function resizeClassAdd() {
                if (window.matchMedia("(min-width: 992px)").matches) {
                    $("body").removeClass("mobilemenu-active");
                    $("#mobilemenu-popup")
                        .removeClass("offcanvas show")
                        .removeAttr("style");
                    $(".sms-mainmenu .offcanvas-backdrop").remove();
                    $(".sms-submenu").removeAttr("style");
                } else {
                    $("body").addClass("mobilemenu-active");
                    $("#mobilemenu-popup").addClass("offcanvas");
                    $(".menu-item-has-children > a").on("click", function (e) {
                        e.preventDefault();
                    });
                }
            }

            $(window).on("resize", function () {
                resizeClassAdd();
            });

            resizeClassAdd();
        },

        salActivation: function () {
            sal({
                threshold: 0.1,
                once: true,
            });
        },

        smsSlickActivation: function (e) {
            $(".slick-slider").slick();
        },

        tiltAnimation: function () {
            var _tiltAnimation = $(".paralax-image");
            if (_tiltAnimation.length) {
                _tiltAnimation.tilt({
                    max: 12,
                    speed: 1e3,
                    easing: "cubic-bezier(.03,.98,.52,.99)",
                    transition: !1,
                    perspective: 1e3,
                    scale: 1,
                });
            }
        },

        menuLinkActive: function () {
            var currentPage = location.pathname.split("/"),
                current = currentPage[currentPage.length - 1];
            $(".mainmenu li a, .main-navigation li a").each(function () {
                var $this = $(this);
                if ($this.attr("href") === current) {
                    $this.addClass("active");
                    $this
                        .parents(".menu-item-has-children")
                        .addClass("menu-item-open open");
                }
            });
        },

        smsHover: function () {
            $(
                ".services-grid, .counterup-progress, .testimonial-grid, .pricing-table, .brand-grid, .blog-list, .about-quality, .team-grid, .splash-hover-control"
            ).mouseenter(function () {
                var self = this;
                setTimeout(function () {
                    $(
                        ".services-grid.active, .counterup-progress.active, .testimonial-grid.active, .pricing-table.active, .brand-grid.active, .blog-list.active, .about-quality.active, .team-grid.active, .splash-hover-control.active"
                    ).removeClass("active");
                    $(self).addClass("active");
                }, 0);
            });
        },
    };
    smsInit.i();
})(window, document, jQuery);
