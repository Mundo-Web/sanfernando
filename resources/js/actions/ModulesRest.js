import { Fetch } from "sode-extend-react";
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
}

export default ModulesRest