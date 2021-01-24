// eslint-disable-next-line func-names
(function () {
  const SELECTORS = {
    minorPublishing: '#minor-publishing',
    screenMetaLinks: '#screen-meta-links',
    editorPostStatus: '#post-status-info',
    editorToolbar: '#ed_toolbar',
    slugBox: '#edit-slug-box',
    editorContentContainer: '#wp-content-editor-container',
    editorContent: '#content',
    postTitle: 'input[name="post_title"]',
    metavalue: 'textarea[name="metavalue"]',
    metakeyselect: 'select[name="metakeyselect"]',
  };
  const VALUES = {
    metakey: 'url',
  };
  const _ = {
    isMobile: false,
  };
  const _$ = {};

  function _setElements() {
    _$.minorPublishing = document.querySelector(SELECTORS.minorPublishing);
    _$.screenMetaLinks = document.querySelector(SELECTORS.screenMetaLinks);
    _$.editorPostStatus = document.querySelector(SELECTORS.editorPostStatus);
    _$.editorToolbar = document.querySelector(SELECTORS.editorToolbar);
    _$.slugBox = document.querySelector(SELECTORS.slugBox);
    _$.editorContentContainer = document.querySelector(
      SELECTORS.editorContentContainer,
    );
    _$.editorContent = document.querySelector(SELECTORS.editorContent);
    _$.metavalue = document.querySelector(SELECTORS.metavalue);
    _$.metakeyselect = document.querySelector(SELECTORS.metakeyselect);
    _$.postTitle = document.querySelector(SELECTORS.postTitle);

    if (_$.postTitle) {
      _$.postTitleLabel = document.querySelector(
        `[for="${_$.postTitle.getAttribute('id')}"]`,
      );
    }
  }

  /**
   * Avoid tag injections into URL params
   * @param {string} html
   * @param {HTMLElement} [tag]
   * @return {string}
   */
  function getEscapedURLString(html, tag = document.createElement('textarea')) {
    // eslint-disable-next-line no-param-reassign
    tag.textContent = html;

    return tag.innerHTML;
  }

  function _decodeAndConvert(text) {
    return decodeURIComponent(text).replaceAll('+', ' ');
  }

  /**
   * Returns a key value object of the given locationSearch expecting it to
   * be window.location.search
   *
   * E.g. ('?a=1&b=2') => {a: 1, b: 2}
   *
   * @param {string} [locationSearch] - normally window.location.search
   * @return {object} key value presentation of search params
   */
  function getLocationSearchParameters(
    locationSearch = window.location.search,
  ) {
    const queryParameters = {};
    let nameValue;

    if (!locationSearch || locationSearch === '?') {
      return queryParameters;
    }
    // remove '?' symbol at the beginning
    locationSearch
      .substr(1)
      .split('&')
      .forEach((searchPart) => {
        nameValue = searchPart.split('=');

        queryParameters[nameValue[0].toLowerCase()] = _decodeAndConvert(
          getEscapedURLString(nameValue[1]),
        );
      });

    return queryParameters;
  }

  function _populatePostTitle() {
    if (_$.postTitle) {
      _$.postTitle.value = _.queryParameters.title;

      if (_$.postTitleLabel) {
        _$.postTitleLabel.setAttribute('hidden', '');
      }
    }
  }

  function _populatePostURL() {
    if (_$.metavalue) {
      _$.metavalue.value = _.queryParameters.url;
    }

    if (_$.metakeyselect) {
      _$.metakeyselect.value = VALUES.metakey;
    }
  }

  function _populatePostDescription() {
    if (_$.editorContent) {
      _$.editorContent.value = _.queryParameters.description;
    }
  }

  function _optimizeSpacing() {
    if (_$.minorPublishing) {
      _$.minorPublishing.setAttribute('hidden', '');
    }
    if (_$.screenMetaLinks) {
      _$.screenMetaLinks.setAttribute('hidden', '');
    }
    if (_$.slugBox) {
      _$.slugBox.setAttribute('hidden', '');
    }
    if (_$.editorToolbar) {
      _$.editorToolbar.setAttribute('hidden', '');
    }
    if (_$.editorPostStatus) {
      _$.editorPostStatus.setAttribute('hidden', '');
    }
    if (_$.editorContent) {
      const callback = (mutationsList) => {
        // eslint-disable-next-line no-restricted-syntax
        for (const mutation of mutationsList) {
          if (mutation.type === 'attributes') {
            _$.editorContent.style.marginTop = '0';
          }
        }
      };
      const observer = new MutationObserver(callback);

      observer.observe(_$.editorContent, { attributes: true });
      _$.editorContent.style.height = '70px';
    }
  }

  function _checkPostTypeParam() {
    if (
      _.queryParameters.title
      && _.queryParameters.url
      && !_.queryParameters.post_type
    ) {
      // We might've arrived here via the Web Share Target API
      // Fix the URL
      window.location = `${window.location.href}&post_type=link`;
    }
  }

  function _setIsMobile() {
    // eslint-disable-next-line no-restricted-globals
    const width = window.innerWidth > 0 ? window.innerWidth : screen.width;

    _.isMobile = width <= 768;
  }

  function _init() {
    _setElements();
    _.queryParameters = getLocationSearchParameters();
    _setIsMobile();
    _checkPostTypeParam();
    if (_.isMobile) {
      _optimizeSpacing();
    }
    if (_.queryParameters.title) {
      _populatePostTitle();
    }
    if (_.queryParameters.url) {
      _populatePostURL();
    }
    if (_.queryParameters.description) {
      _populatePostDescription();
    }
  }

  _init();
}());
