import * as MUTATIONS from './mutations';
import * as ACTIONS from './actions';
import { createLoadings } from '../default/loadings';
import { createUrl } from '../default/urls';

const RESOURCE = 'client';
const URL = createUrl('result');
const LOADINGS = createLoadings(RESOURCE, ACTIONS);

export {
  RESOURCE,
  MUTATIONS,
  ACTIONS,
  LOADINGS,
  URL,
};
