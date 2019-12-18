export const APP = process.env.MIX_APP_URL;
export const API = `${APP}/api`;

export const createUrl = resource => `${API}/${resource}`;
