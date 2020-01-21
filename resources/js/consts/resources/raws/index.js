import { MUTATIONS, ACTIONS } from '../default';
import { createLoadings } from '../default/loadings';
import { createUrl } from '../default/urls';

const RESOURCE = 'raws';
const LOADINGS = createLoadings(RESOURCE, ACTIONS);
const URL = createUrl(RESOURCE);

export {
  RESOURCE,
  MUTATIONS,
  ACTIONS,
  LOADINGS,
  URL,
};
