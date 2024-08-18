import { JSON } from "sode-extend-react";
import BasicRest from "./BasicRest";

class SourcesRest extends BasicRest {
  path = 'sources'

  save = async (file, moduleId = null, showNotify = true) => {
    try {
      const formData = new FormData();
      formData.append('source', file);
      formData.append('module_id', moduleId);

      const res = await fetch(`/api/${this.path}`, {
        method: 'POST',
        headers: {
          'X-Xsrf-Token': decodeURIComponent(Cookies.get('XSRF-TOKEN')),
        },
        body: formData,
      });

      if (!res.ok) {
        const result = await res.json();
        throw new Error(result?.message || 'Ocurrió un error inesperado');
      }

      const result = await res.json();
      showNotify &&
        Notify.add({
          icon: '/assets/img/logo-login.svg',
          title: 'Correcto',
          body: result.message,
          type: 'success',
        });

      return result.data;
    } catch (error) {
      showNotify &&
        Notify.add({
          icon: '/assets/img/logo-login.svg',
          title: 'Error',
          body: error.message,
          type: 'danger',
        });

      return null;
    }
  };
}

export default SourcesRest