import { JSON } from "sode-extend-react";
import BasicRest from "./BasicRest";

class SourcesRest extends BasicRest {
  path = 'sources'

  save = async (file, showNotify = true) => {
    try {
      const formData = new FormData()
      formData.append('source', file)
      const res = await fetch(`/api/${this.path}`, {
        method: 'POST',
        headers: {
          'X-Xsrf-Token': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
        },
        body: formData
      })
      const result = JSON.parseable(await res.json())
      if (!res) throw new Error(result?.message || 'Ocurrio un error inesperado')

      showNotify && Notify.add({
        icon: '/assets/img/logo-login.svg',
        title: 'Correcto',
        body: result.message,
        type: 'success'
      })
      return result.data
    } catch (error) {
      showNotify && Notify.add({
        icon: '/assets/img/logo-login.svg',
        title: 'Error',
        body: error.message,
        type: 'danger'
      })
      return null
    }
  }
}

export default SourcesRest