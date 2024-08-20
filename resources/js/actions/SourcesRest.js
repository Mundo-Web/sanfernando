import { Notify } from "sode-extend-react";
import BasicRest from "./BasicRest";

class SourcesRest extends BasicRest {
  path = 'sources'

  save = async (request, showNotify = true) => {
    try {
      const res = await fetch(`/api/${this.path}`, {
        method: 'POST',
        headers: {
          'X-Xsrf-Token': decodeURIComponent(Cookies.get('XSRF-TOKEN')),
        },
        body: request,
      });

      if (!res.ok) {
        const result = await res.json();
        throw new Error(result?.message || 'Ocurrió un error inesperado');
      }

      const result = await res.json();
      showNotify &&
        Notify.add({
          icon: '/images/icon.svg',
          title: 'Correcto',
          body: result.message,
          type: 'success',
        });

      return result.data;
    } catch (error) {
      showNotify &&
        Notify.add({
          icon: '/images/icon.svg',
          title: 'Error',
          body: error.message,
          type: 'danger',
        });

      return null;
    }
  };
}

export default SourcesRest