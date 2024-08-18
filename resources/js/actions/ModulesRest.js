import { Fetch, Notify } from "sode-extend-react";
import BasicRest from "./BasicRest";

class ModulesRest extends BasicRest {
  path = 'modules'

  byCourse = async (courseId) => {
    try {
      const { status, result } = await Fetch(`/api/${this.path}/${courseId}`)
      if (!status) throw new Error(result?.message || 'Ocurrio un error inesperado')
      return result.data
    } catch (error) {
      console.error(error.message)
      return []
    }
  }

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
          icon: '/assets/img/logo-login.svg',
          title: 'Correcto',
          body: result.message,
          type: 'success',
        });

      return result.data || true;
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

export default ModulesRest