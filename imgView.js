function warpImg() {
    // Define CSS for full-screen zoom viewer
    const zoomStyle = `
.zoom-container {
  display: inline-block;
  position: relative;
  cursor: zoom-in;
}

.zoom-img {
  transition: transform 0.3s ease;
  max-width: 100%;
}

.zoom-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
  transform: scale(0);
  transition: transform 0.3s ease;
  z-index: 9999; /* Ensure it stays on top */
}

.zoom-overlay img {
  max-width: 90%;
  max-height: 90%;
}
`;

    const styleTag = document.createElement('style');
    styleTag.innerHTML = zoomStyle;
    document.head.appendChild(styleTag);

    // Add event listeners to each image element
    document.querySelectorAll('img').forEach(img => {
        const container = document.createElement('div');
        container.classList.add('zoom-container');

        const overlay = document.createElement('div');
        overlay.classList.add('zoom-overlay');
        const zoomImg = document.createElement('img');
        zoomImg.src = img.src;

        overlay.appendChild(zoomImg);
        container.appendChild(overlay);
        img.parentNode.insertBefore(container, img);
        container.appendChild(img);

        // Image click event to show the full-screen overlay
        img.addEventListener('click', () => {
            overlay.style.transform = 'scale(1)';
        });

        // Click event on the overlay to hide it
        overlay.addEventListener('click', () => {
            overlay.style.transform = 'scale(0)';
        });
    });
}
