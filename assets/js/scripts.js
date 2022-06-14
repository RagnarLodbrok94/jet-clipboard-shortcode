'use strict';

document.addEventListener('DOMContentLoaded', function () {
  let jetClipboards = document.querySelectorAll('[data-jet-clipboard]');

  if (!jetClipboards.length) {
    return;
  }

  const onCLick = (content) => {
    navigator.clipboard.writeText(content).then(() => {
      let timerId;
      node.classList.add('copied');

      timerId = setTimeout(() => {
        node.classList.remove('copied');
        clearTimeout(timerId);
      }, 1500);
    });
  }

  jetClipboards.forEach(node => {
    let content = node.getAttribute('data-jet-clipboard');

    if (!content) {
      return;
    }

    node.addEventListener('click', () => onCLick(content));
  });
});