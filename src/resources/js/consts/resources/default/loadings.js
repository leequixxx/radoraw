export const createLoadings = (resource, actions) => Object.fromEntries(
  Object.entries(actions).map(([actionKey, actionValue]) => [actionKey, `${resource}.${actionValue}`])
);
