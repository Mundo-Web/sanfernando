const copyToClipboard = () => {
  const link = window.location.href; // Obtener la URL actual
  navigator.clipboard.writeText(link).then(() => {
    alert('Link copiado al portapapeles');
  }).catch(err => {
    console.error('Error al copiar el link: ', err);
  });
};

export default copyToClipboard;