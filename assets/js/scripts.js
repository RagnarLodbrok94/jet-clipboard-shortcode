'use strict';

document.addEventListener('DOMContentLoaded', function () {
  const onCLick = (content, node) => {
    navigator.clipboard.writeText(content).then(() => {
      let timerId;
      node.classList.add('copied');

      timerId = setTimeout(() => {
        node.classList.remove('copied');
        clearTimeout(timerId);
      }, 500);
    });
  };

  document.addEventListener('click', e => {
    let node = e.target.closest('[data-jet-clipboard]');

    if (!document.contains(node)) {
      return;
    }

    if (!node) {
      return;
    }

    let content = node.getAttribute('data-jet-clipboard');

    if (!content) {
      return;
    }

    onCLick(content, node);
  });
});