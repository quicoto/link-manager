// eslint-disable-next-line func-names
(function () {
  const SELECTORS = {
    editorContent: '#content',
    postTitle: 'input[name="post_title"]',
    metavalue: 'textarea[name="metavalue"]',
    metakeyselect: 'select[name="metakeyselect"]',
  };
  const VALUES = {
    metakey: 'url',
  };
  const _ = {};
  const _$ = {};

  function _setElements() {
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

  function _init() {
    _setElements();
    _.queryParameters = getLocationSearchParameters();
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
