import { Fetch, Notify } from "sode-extend-react";
import BasicRest from "../BasicRest";

class AttempsRest extends BasicRest {
  path = 'admin/certificates'

  assign = async (request) => {
    try {
      const { status, result } = await Fetch(`/api/${this.path}/assign`, {
        method: 'POST',
        body: JSON.stringify(request)
      })

      if (!status) throw new Error(result?.message || 'Ocurrio un error inesperado')

      Notify.add({
        icon: '/images/icon.svg',
        title: 'Correcto',
        body: result.message,
        type: 'success'
      })
      return result.data
    } catch (error) {
      Notify.add({
        icon: '/images/icon.svg',
        title: 'Error',
        body: error.message,
        type: 'danger'
      })
      return null
    }
  }
}

export default AttempsRest