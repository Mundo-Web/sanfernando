import React, { useEffect, useRef } from 'react';

function InitialsImage({ name }) {
  const canvasRef = useRef(null);

  useEffect(() => {
    const canvas = canvasRef.current;
    const ctx = canvas.getContext('2d');
    const initials = getInitials(name);

    // Configurar el lienzo
    ctx.fillStyle = '#000'; // Color de fondo
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Configurar el texto
    ctx.font = 'bold 50px Arial';
    ctx.fillStyle = '#fff'; // Color del texto
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText(initials, canvas.width / 2, canvas.height / 2);
  }, [name]);

  return <canvas ref={canvasRef} width={100} height={100} />;
}

function getInitials(name) {
  return name.split(' ').map(word => word[0].toUpperCase()).join('');
}

export default InitialsImage;