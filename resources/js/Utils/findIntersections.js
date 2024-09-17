const findIntersections = (
  arrays = [],
  callback = (a, b) => a == b
) => {
  return arrays[0].filter(obj =>
    arrays.every(arr => arr.some(item => callback(item, obj)))
  );
}

export default findIntersections