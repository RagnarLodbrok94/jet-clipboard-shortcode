'use strict';

document.addEventListener('DOMContentLoaded', function () {
  const onClick = async (content, node) => {
    try {
      await navigator.clipboard.writeText(content);
      node.classList.add('copied');
      setTimeout(() => node.classList.remove('copied'), 500);
    } catch (err) {
      console.error("Clipboard error:", err);
    }
  };

  document.addEventListener('click', e => {
    let node = e.target.closest('[data-jet-clipboard]');

    if (!node) {
      return;
    }

    let content = node.getAttribute('data-jet-clipboard');

    if (!content) {
      return;
    }

    onClick(content, node);
  });
});